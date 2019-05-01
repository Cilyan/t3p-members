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
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">@lang('Edit your helper profile')</h1>
                            <p class="mb-5">
                                @lang('Thanks for being awesome and registering yourself to help us in the <strong>:edition</strong> edition.', ['edition' => $edition->id])
                                @lang('In order to properly organize, we need a few more information.')
                                @lang('Please note that the driving license is important for us to declare at the prefecture. Fill the field if you can.')
                            </p>
                        </div>

                        @include('helper._form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
