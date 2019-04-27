<?php

namespace App\Http\Controllers;

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
        return view('home', [
            "user" => auth()->user(),
            "profiles" => auth()->user()->profiles
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function account()
    {
        return view('home', [
            "user" => auth()->user(),
            "profiles" => auth()->user()->profiles
        ]);
    }
}
