<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Edition;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->profiles()->count() == 0) {
            return redirect()->route('profile.create');
        }
        return $this->participants_view(auth()->user());
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function account()
    {
        return $this->participants_view(auth()->user()); // Temporary
    }

    public function participants_view(User $user) {
        $editions = function ($profile) {
            return Edition::active_for_helpers()->whereDoesntHave(
                'all_helpers',
                function ($query) use ($profile) {
                    $query->where('profile_id', $profile->id);
                }
            )->get();
        };
        return view('home', [
            "user" => $user,
            "profiles" => $user->profiles()->with("helpers_active")->get(),
            "editions" => $editions
        ]);
    }
}
