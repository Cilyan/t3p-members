@extends('layouts.wizard')

@section('wizard_content')
    <div class="text-center mb-5">
        <h1 class="h4 text-gray-900 mb-4">@lang('Login')</h1>
        <p>
            @lang('Please login to access the interface.')
            @lang('Forgot Your Password?')
            <a href="{{ route('password.request') }}">
                @lang('Reset it.')
            </a>
            @lang("You don't have an account yet?")
            <a href="{{ route('register') }}">@lang('Create one.')</a>
        </p>
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group">
            <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" placeholder="@lang('E-Mail Address')" name="email" required autofocus>
            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" placeholder="@lang('Password')" name="password" required>
            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="remember"  id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label small" for="remember">@lang('Remember Me')</label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-user btn-block">
            @lang('Login')
        </button>
        <hr>
        @include('auth.shared.social_providers')
    </form>
    <hr>
    @if (Route::has('password.request'))
        <div class="text-center">
            <a href="{{ route('password.request') }}">
                @lang('Forgot Your Password?')
            </a>
        </div>
    @endif
    <div class="text-center">
        <a href="{{ route('register') }}">@lang('Create an Account!')</a>
    </div>
@endsection
