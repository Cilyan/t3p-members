<?php

namespace App\Http\Controllers;

use App\Helper;
use App\Profile;
use App\Edition;
use Illuminate\Http\Request;
use App\Http\Requests\HelperRequest;

class HelperController extends Controller
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
        $this->middleware('can:update,helper')->except(
            ['create', 'store', 'thanks']
        );
        $this->middleware('can:update,profile')->only(
            ['create', 'store', 'thanks']
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Profile $profile, Edition $edition, Request $request)
    {
        $helper = new Helper();
        $edit = false;

        if ($profile->birthday->age >= 18) {
            $helper->legal_age = true;
        }

        // Try to prefill form with data from last edition
        $last_helper = $profile->helpers_latest();
        if ($last_helper) {
            $helper->phone_provider = $last_helper->phone_provider;
            $helper->driving_license = $last_helper->driving_license;
            $helper->driving_license_location = $last_helper->driving_license_location;
            $helper->prefered_activity = $last_helper->prefered_activity;
            $helper->prefered_sector = $last_helper->prefered_sector;
            $helper->housing = $last_helper->housing;
        }

        $in_wizard = $request->input('wizard', true);

        return view('helper.edit', compact('edit', 'helper', 'profile', 'edition', 'in_wizard'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HelperRequest $request, Profile $profile, Edition $edition)
    {
        $validated = $request->validated();
        $helper = Helper::make($validated);
        $helper->profile()->associate($profile);
        $helper->edition()->associate($edition);
        $helper->save();
        $in_wizard = $request->input('wizard', true);
        if ($in_wizard) {
            $opts = [];
        }
        else {
            $opts = ['wizard' => false];
        }
        return redirect()->route(
            'helper.thanks',
            [
                'profile' => $helper->profile,
                'edition' => $helper->edition
            ] + $opts
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Helper  $helper
     * @return \Illuminate\Http\Response
     */
    public function show(Helper $helper)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Helper  $helper
     * @return \Illuminate\Http\Response
     */
    public function edit(Helper $helper)
    {
        $profile = $helper->profile;
        $edition = $helper->edition;
        $edit = true;
        $in_wizard = false;
        return view('helper.edit', compact('edit', 'profile', 'helper', 'edition', 'in_wizard'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Helper  $helper
     * @return \Illuminate\Http\Response
     */
    public function update(HelperRequest $request, Helper $helper)
    {
        $validated = $request->validated();
        $helper->update($validated);
        $helper->save();
        return redirect()->intended(
            route('profile.show', ['profile' => $helper->profile])
        )->with(
            'status', __('Helper profile updated.')
        );
    }

    /**
     * Activate a helper profile
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Helper  $helper
     * @return \Illuminate\Http\Response
     */
    public function activate(Request $request, Helper $helper)
    {
        $helper->active = true;
        $helper->save();
        return back();
    }

    /**
     * Deactivate a helper profile
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Helper  $helper
     * @return \Illuminate\Http\Response
     */
    public function deactivate(Request $request, Helper $helper)
    {
        $helper->active = false;
        $helper->save();
        return back();
    }

    /**
     * Show a confirmation box for deleting a helper profile.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function delete(Helper $helper)
    {
        return view('helper.delete', compact('helper'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Helper  $helper
     * @return \Illuminate\Http\Response
     */
    public function destroy(Helper $helper)
    {
        $profile = $helper->profile;
        $helper->delete();
        return redirect()->intended(
            route('profile.show', ['profile' => $profile])
        )->with(
            'status', __('Helper profile removed.')
        );
    }

    /**
     * Show a thanks page.
     *
     * @param  \App\Helper  $helper
     * @return \Illuminate\Http\Response
     */
    public function thanks(Profile $profile, Edition $edition, Request $request)
    {
        $in_wizard = $request->input('wizard', true);
        return view('helper.thanks', compact('profile', 'edition', 'in_wizard'));
    }
}
