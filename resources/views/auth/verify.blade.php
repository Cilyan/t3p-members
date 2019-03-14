@extends('layouts.structure')

@section('bodyclass', 'bg-gradient-primary')

@section('app')
<main>
    @include('layouts.alerts')
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-image" style="background-image: url('{{ asset('img/4.jpg') }}');"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">@lang('Verify Your Email Address')</h1>
                                        <p class="mb-4">
                                            @lang('Before proceeding, please check your email for a verification link.')
                                            @lang('If you did not receive the email'),
                                            <a href="{{ route('verification.resend') }}">
                                                @lang('click here to request another')
                                            </a>.
                                        </p>
                                    </div>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            @lang('Logout')
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
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
