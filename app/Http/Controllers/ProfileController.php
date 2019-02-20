<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;

class ProfileController extends Controller
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
        $this->middleware('can:update,profile')->except(
            ['create', 'store']
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $profile = new Profile();
        $edit = false;
        return view('profile.edit', compact('edit', 'profile'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProfileRequest $request)
    {
        $validated = $request->validated();
        auth()->user()->profiles()->create($validated);
        return redirect()->intended(route('home'))->with(
            'status', trans('Participant created.')
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        $edit = true;
        return view('profile.edit', compact('edit', 'profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileRequest $request, Profile $profile)
    {
        $validated = $request->validated();
        $profile->update($validated);
        $profile->save();
        return redirect()->intended(route('home'))->with(
            'status', trans('Participant updated.')
        );
    }

    /**
     * Show a confirmation box for deleting a profile.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function delete(Profile $profile)
    {
        return view('profile.delete', compact('profile'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        $profile->delete();
        return redirect()->intended(route('home'))->with(
            'status', trans('Participant removed.')
        );
    }
}