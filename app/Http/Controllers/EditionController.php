<?php

namespace App\Http\Controllers;

use App\Edition;
use Illuminate\Http\Request;
use App\Http\Requests\EditionRequest;

class EditionController extends Controller
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
        $this->middleware('can:manage,App\Edition');
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
    public function create()
    {
        $edition = new edition();
        $edit = false;
        return view('edition.edit', compact('edit', 'edition'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EditionRequest $request)
    {
        $validated = $request->validated();
        $edition = Edition::create($validated);
        return redirect()->intended(route('admin.home'))->with(
            'status', trans('Edition created.')
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Edition  $edition
     * @return \Illuminate\Http\Response
     */
    public function show(Edition $edition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Edition  $edition
     * @return \Illuminate\Http\Response
     */
    public function edit(Edition $edition)
    {
        $edit = true;
        return view('edition.edit', compact('edit', 'edition'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Edition  $edition
     * @return \Illuminate\Http\Response
     */
    public function update(EditionRequest $request, Edition $edition)
    {
        $validated = $request->validated();
        $edition->update($validated);
        $edition->save();
        return redirect()->intended(route('admin.home'))->with(
            'status', trans('Edition updated.')
        );
    }

    /**
     * Show a confirmation box for deleting an edition.
     *
     * @param  \App\Edition  $edition
     * @return \Illuminate\Http\Response
     */
    public function delete(Edition $edition)
    {
        return view('edition.delete', compact('edition'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Edition  $edition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Edition $edition)
    {
        $edition->delete();
        return redirect()->intended(route('admin.home'))->with(
            'status', trans('Edition removed.')
        );
    }
}
