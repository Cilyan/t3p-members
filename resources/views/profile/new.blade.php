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
                        @component('layouts.stepper', ['step' => 3])
                        @endcomponent

                        <div class="text-center mb-5">
                            <h1 class="h4 text-gray-900 mb-4">@lang('Create your participant profile')</h1>
                            <p>
                                @lang('Tell us about you. This profile is for one participant. You will be able to add more participants later if you need so.')
                            </p>
                        </div>

                        @include('profile._form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
