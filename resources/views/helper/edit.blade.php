@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('from-profile-creation'))
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow border-left-info mb-4">
                    <div class="card-body row align-items-center">
                        <div class="col-md-9 pb-3 pb-md-0">
                            <p class="mb-0 font-weight-bold">@lang('Fill the form below to subscribe as helper for the :edition edition', ['edition' => $edition->id])</p>
                        </div>
                        <div class="col-md-3 text-right">
                            <a href="{{ route('profile.show', ['profile' => $profile]) }}" class='btn btn-info'><i class="fas fa-clock"></i> {{ __('Later') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow mt-4">
                <div class="card-header">
                    <h6 class="my-1 font-weight-bold">
                        @lang('Helper Profile')
                    </h6>
                </div>

                <div class="card-body">
                    @include('helper._form')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
