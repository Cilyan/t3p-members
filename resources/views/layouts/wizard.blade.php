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
                        @yield('wizard_content')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
