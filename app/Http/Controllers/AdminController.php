<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Edition;

class AdminController extends Controller
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
        $this->middleware('isadmin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.home', [
            "user" => auth()->user(),
            "editions" => Edition::all()
        ]);
    }
}
