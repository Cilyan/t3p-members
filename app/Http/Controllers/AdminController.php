<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Edition;
use App\Profile;
use App\Exports\HelpersExport;

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
        $edition = Edition::active_for_helpers()->first();
        if ($edition) {
            $helpers_count = $edition->helpers()->count();
        }
        else {
            $helpers_count = __("No active editions");
        }
        return view('admin.home', [
            "user" => auth()->user(),
            "editions" => Edition::all(),
            "users_count" => User::count(),
            "profiles_count" => Profile::count(),
            "helpers_count" => $helpers_count,
            "current_edition" => $edition,
        ]);
    }

    public function export(Edition $edition)
    {
        return new HelpersExport($edition);
    }

    /**
     * Show the list of all profiles.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function profiles()
    {
        return view('admin.profiles', [
            "profiles" => Profile::orderBy('last_name')->orderBy('first_name')->paginate(20)
        ]);
    }

    /**
     * Show the list of all profiles.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function accounts()
    {
        return view('admin.accounts', [
            "accounts" => User::orderBy('name')->paginate(20)
        ]);
    }
}
