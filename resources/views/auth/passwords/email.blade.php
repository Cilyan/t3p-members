@extends('layouts.wizard')

@section('wizard_content')
    <div class="text-center">
        <h1 class="h4 text-gray-900 mb-2">@lang('Forgot Your Password?')</h1>
        <p class="mb-4">@lang('We get it, stuff happens. Just enter your email address below and we\'ll send you a link to reset your password!')</p>
    </div>
    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="form-group">
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="@lang('E-Mail Address')" required>

            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <button type="submit" class="btn btn-primary btn-user btn-block">
            @lang('Send The Link')
        </button>
    </form>
    <div class="text-center mt-4">
        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 15rem;" src="{{ asset('svg/undraw_security_o890.svg') }}" alt="">
    </div>
    <hr>
    <div class="text-center">
        <a href="{{ route('register') }}">@lang('Create an Account!')</a>
    </div>
    <div class="text-center">
        <a href="{{ route('login') }}">@lang('Already have an account? Login!')</a>
    </div>
@endsection
