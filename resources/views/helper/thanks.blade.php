@extends('layouts.app')

@section('content')
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

                        @component('layouts.stepper', ['step' => 5])
                        @endcomponent

                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">@lang('Thanks a lot!')</h1>
                            <p class="mb-4">
                                @lang('We are very happy to count you, <strong>:username</strong>, as helper on the :edition edition of the Trail des 3 Pics.', ['username' => $profile->full_name(), 'edition' => $edition->id])
                                @lang('We will come back to you very soon with full details on where you will participate and how.')
                            </p>
                            <p>
                                @lang('See you soon!')
                            </p>
                            <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 15rem;" src="{{ asset('svg/undraw_appreciation_2_v4bt.svg') }}" alt="">
                        </div>
                        <hr>
                        <div class="text-center">
                            <a href="{{ route('home') }}">
                                <i class="fas fa-home"></i>
                                @lang('Go to my home page')
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
