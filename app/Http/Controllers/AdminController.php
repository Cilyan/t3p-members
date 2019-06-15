<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Edition;
use App\Profile;
use App\Exports\HelpersExport;
use Carbon\Carbon;

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

            $stats = $edition->helpers_stats();
            $cumsum = 0;
            foreach($stats as $item) {
                $cumsum += $item->aggregate;
                $item->y = $cumsum;
            }
            $data = $stats->map(
                function($item, $key) {
                    $obj = (object) [];
                    $obj->x = $item->date;
                    $obj->y = $item->y;
                    return $obj;
                }
            );
            $today = (object) [];
            $today->x = Carbon::now()->format('Y-m-d');
            $today->y = $data->last()->y;
            $data->push($today);
        }
        else {
            $helpers_count = __("No active editions");
            $data = null;
        }
        return view('admin.home', [
            "user" => auth()->user(),
            "users_count" => User::count(),
            "profiles_count" => Profile::count(),
            "helpers_count" => $helpers_count,
            "current_edition" => $edition,
            "data" => $data
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
