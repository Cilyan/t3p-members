@extends('layouts.wizard')

@section('wizard_content')
    @component('layouts.stepper', ['step' => 2])
    @endcomponent

    <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">@lang('Verify Your Email Address')</h1>
        <p class="mb-4">
            @lang('Before proceeding, please check your email for a verification link.')
            @lang('If you did not receive the email'),
            <a href="{{ route('verification.resend') }}">
                @lang('click here to request another')
            </a>.
        </p>
        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 15rem;" src="{{ asset('svg/undraw_mail_cg1t.svg') }}" alt="">
    </div>
    <hr>
    <div class="text-center">
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            @lang('Logout')
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
@endsection
