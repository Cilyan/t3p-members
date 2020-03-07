@extends('layouts.wizard')

@section('wizard_content')
    <div class="text-center mb-5">
        <h1 class="h4 text-gray-900 mb-4">@lang('Welcome!')</h1>
    </div>
    <div class="row mt-4">
        <a href="{{ route('register') }}" class="d-block text-center text-decoration-none col-sm-6 mb-3 mb-sm-0 text-black">
            <div class="card border-bottom-primary shadow h-100 py-2">
                <div class="card-body ">
                    <p class="card-text text-black">@lang("I'm new!")</p>
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 15rem;" src="{{ asset('svg/undraw_energizer_2224.svg') }}" alt="@lang("I'm new!")">
                </div>
            </div>
        </a>
        <a href="{{ route('login') }}" class="d-block text-center text-decoration-none col-sm-6 text-black">
            <div class="card border-bottom-primary shadow h-100 py-2">
                <div class="card-body">
                    <p class="card-text text-black">@lang("I'm back!")</p>
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 15rem;" src="{{ asset('svg/undraw_super_woman_dv0y.svg') }}" alt="@lang("I'm back!")">
                </div>
            </div>
        </a>
    </div>
    @if (Route::has('password.request'))
        <hr>
        <div class="text-center">
            <a href="{{ route('password.request') }}">
                @lang('Forgot Your Password?')
            </a>
        </div>
    @endif
@endsection
