@extends('layouts.structure')

@section('app')
<main>
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
</main>
@endsection
