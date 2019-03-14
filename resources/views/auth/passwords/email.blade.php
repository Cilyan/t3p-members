@extends('layouts.structure')

@section('bodyclass', 'bg-gradient-primary')

@section('app')
<main class="py-4">
    @include('layouts.alerts')
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-image" style="background-image: url('{{ asset('img/1.jpg') }}');"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">@lang('Forgot Your Password?')</h1>
                                        <p class="mb-4">@lang('We get it, stuff happens. Just enter your email address below and we\'ll send you a link to reset your password!')</p>
                                    </div>
                                    <form method="POST" action="{{ route('password.email') }}" class="user">
                                        @csrf

                                        <div class="form-group">
                                            <input id="email" type="email" class="form-control form-control-user{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="@lang('E-Mail Address')" required>

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
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="{{ route('register') }}">@lang('Create an Account!')</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="{{ route('login') }}">@lang('Already have an account? Login!')</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</main>
@endsection
