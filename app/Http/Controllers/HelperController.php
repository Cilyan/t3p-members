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
    public function create(Profile $profile, Edition $edition)
    {
        $helper = new Helper();
        $edit = false;

        if ($profile->birthday->age >= 18) {
            $helper->legal_age = true;
        }

        return view('helper.new', compact('edit', 'helper', 'profile', 'edition'));
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
        return redirect()->intended(
            route('helper.thanks', ['profile' => $helper->profile, 'edition' => $helper->edition])
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
        return view('helper.edit', compact('edit', 'profile', 'helper', 'edition'));
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
    public function thanks(Profile $profile, Edition $edition)
    {
        return view('helper.thanks', compact('profile', 'edition'));
    }
}
