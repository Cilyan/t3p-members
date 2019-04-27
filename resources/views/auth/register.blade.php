@extends('layouts.structure')

@section('app')
<main class="my-5">
    @include('layouts.alerts')
    <div class="header-message text-center my-5">
        <h1>
            <small>@lang('Participate to the')</small><br/>
            <strong>Trail des 3 Pics</strong>
        </h1>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card o-hidden border-0 shadow-lg">
                    <div class="card-body p-0">
                        <div class="p-5">
                            @component('layouts.stepper', ['step' => 1])
                            @endcomponent

                            <div class="text-center mb-5">
                                <h1 class="h4 text-gray-900 mb-4">@lang('Create an account')</h1>
                                <p>
                                    @lang('Welcome to the Trail des 3 Pics! You wish to help us? Please create an account, or ')
                                    <a href="{{route('login')}}">@lang('log yourself in')</a>
                                    @lang('if you already have one.')
                                    @lang('This year, <strong>only helpers</strong> can register through this interface. Please refer to the')
                                    <a href="https://www.les3pics.fr/">@lang('main site')</a>
                                    @lang('to subscribe as a trailer.')
                                </p>
                            </div>

                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="form-group">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="@lang('Name')" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="@lang('E-Mail Address')" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="@lang('Password')" required>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-sm-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="@lang('Confirm Password')" required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    @lang('Register')
                                </button>
                                <hr>
                                @include('auth.shared.social_providers')
                            </form>
                            <hr>
                            <div class="text-center">
                                <a href="{{ route('login') }}">
                                    @lang('Already have an account? Login!')
                                </a>
                            </div>
                            @if (Route::has('password.request'))
                                <div class="text-center">
                                    <a href="{{ route('password.request') }}">
                                        @lang('Forgot Your Password?')
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
