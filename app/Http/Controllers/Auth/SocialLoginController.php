<?php

namespace App\Http\Controllers\Auth;

use Socialite;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\User;
use App\SocialLogin;


class SocialLoginController extends Controller
{
    /**
     * Redirect the user to the Provider authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirect($provider)
    {
        $providerClientId = config('services.' . $provider . '.client_id');

        if (empty($providerClientId)) {
            abort(404);
        }
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Gets the social handle.
     *
     * @param string $provider The provider
     *
     * @return Redirect
     */
    public function callback($provider, Request $request)
    {
        $providerClientId = config('services.' . $provider . '.client_id');

        if (empty($providerClientId)) {
            abort(404);
        }

        if (empty($request->input("code"))) {
            return redirect()->route("login");
        }

        $socialUserObject = Socialite::driver($provider)->user();

        // try to find the user back from previous login with this provider
        $socialLogin =
            SocialLogin::where("social_id", $socialUserObject->getId())
            ->where("provider", $provider)
            ->first();

        $user = null;

        if (empty($socialLogin)) {
            // try to find user by email, or create one
            if (!$socialUserObject->getEmail()) {
                abort(505, "Email not provided");
            }

            $user = User::firstOrCreate(
                [
                    'email' => $socialUserObject->getEmail()
                ],
                [
                    'name' => $socialUserObject->getName(),
                    'password' => Hash::make(str_random(256)),
                ]
            );

            $socialLogin = new SocialLogin();

            $socialLogin->social_id = $socialUserObject->getId();
            $socialLogin->provider = $provider;

            $socialLogin->user()->associate($user);

            $socialLogin->save();
        }
        else {
            $user = $socialLogin->user;
        }

        auth()->login($user);

        return redirect()->intended('home');
    }
}
