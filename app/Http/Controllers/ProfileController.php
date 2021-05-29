<?php

namespace App\Http\Controllers;

use App\Models\Edition;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Requests\ProfileRequest;
use Monarobase\CountryList\CountryListFacade as CountryList;

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
        $first_profile = auth()->user()->profiles()->count() == 0 ? true : false;
        $in_wizard = true;
        $countries = CountryList::getList(App::currentLocale(), 'php');
        return view('profile.edit', compact('edit', 'profile', 'first_profile', 'in_wizard', 'countries'));
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
        $profile = auth()->user()->profiles()->create($validated);

        // If subscriptions for helpers are open, send user to helper profile
        // creation. Else, send them to profile display.
        $active_edition = Edition::active_for_helpers()->first();
        if ($active_edition) {
            return redirect()->route(
                'helper.create', [
                    'profile' => $profile,
                    'edition' => $active_edition
                ]
            );
        }

        return redirect()->route('profile.show', ['profile' => $profile])->with(
            'status', __('Participant created.')
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
        $editions = Edition::active_for_helpers()->whereDoesntHave(
            'all_helpers',
            function ($query) use ($profile) {
                $query->where('profile_id', $profile->id);
            }
        )->get();
        $helpers = $profile->helpers_active()->with('edition')->get();
        $profile_country = CountryList::getOne($profile->country, App::currentLocale());
        return view('profile.show', compact('profile', 'editions', 'helpers', 'profile_country'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile, Request $request)
    {
        $edit = true;
        $first_profile = false;
        $in_wizard = $request->input('wizard', false);
        $countries = CountryList::getList(App::currentLocale(), 'php');
        return view('profile.edit', compact('edit', 'profile', 'first_profile', 'in_wizard', 'countries'));
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

        // If subscriptions for helpers are open, send user to helper profile
        // creation. Else, send them to profile display.
        $active_edition = Edition::active_for_helpers()->first();
        $wizard = $request->input('wizard', false);
        if ($active_edition && $wizard) {
            return redirect()->route(
                'helper.create', [
                    'profile' => $profile,
                    'edition' => $active_edition
                ]
            );
        }

        return redirect()->route('profile.show', ['profile' => $profile])->with(
            'status', __('Participant updated.')
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
            'status', __('Participant removed.')
        );
    }
}
