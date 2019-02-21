<?php

namespace App\Http\Controllers\Auth;

use Socialite;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RedirectsUsers;
use App\Http\Controllers\Controller;
use App\User;
use App\SocialLogin;


class SocialLoginController extends Controller
{
    use RedirectsUsers;

    /**
     * Where to redirect users after verification.
     *
     * @return string
     */
    protected function redirectTo() {
        return route('home');
    }

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
            return redirect()->route("login")
                ->with('status-error', trans("auth.social_failed"));
        }

        $socialUserObject = Socialite::driver($provider)->user();

        // try to find the user back from previous login with this provider
        $socialLogin =
            SocialLogin::where("social_id", $socialUserObject->getId())
            ->where("provider", $provider)
            ->first();

        $user = null;
        $passwordWasReset = false;

        if (empty($socialLogin)) {
            // try to find user by email, or create one
            if (!$socialUserObject->getEmail()) {
                abort(505, "Email not provided");
            }

            $user =
                User::where('email', $socialUserObject->getEmail())
                ->first();

            if (!empty($user)) {
                /* Verify that user verified their email. */
                /* If they didn't, invalidate password. */
                /* This is done to prevent that someone registers an account */
                /* with a mail it doesn't own, and then waits for the real */
                /* owner to log in using social account. */
                if (!$user->hasVerifiedEmail()) {
                    $user->password = Hash::make(str_random(256));
                    $user->save();
                    $user->markEmailAsVerified();
                    $passwordWasReset = true;
                }
            }
            else {
                $user = new User();
                $user->name = $socialUserObject->getName();
                $user->password = Hash::make(str_random(256));
                $user->email = $socialUserObject->getEmail();
                $user->save();
                $user->markEmailAsVerified();
            }

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

        $response = redirect()->intended($this->redirectPath());

        if ($passwordWasReset) {
            $response->with('status', trans('auth.social_password_reset'));
        }

        return $response;
    }
}
