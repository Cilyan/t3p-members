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
                    <div class="text-center p-5">
                        <h1 class="h4 text-gray-900">@lang('Participants')</h1>
                    </div>

                    <div class="list-group list-group-flush">
                        @foreach ($profiles as $profile)
                        <a href="{{ route('profile.show', ['profile' => $profile]) }}" class="list-group-item list-group-item-action p-0">
                            <div class="row">
                                <div class="col-sm-5 col-md-4 text-center bg-gradient-side-primary">
                                    <img class="img-fluid rounded bg-white my-3 p-1" style="width: 7rem;" src="https://robohash.org/{{ $profile->slug() }}?set=set4&amp;size=128x128" alt="">
                                    <p class="mb-3 text-white">{{ $profile->full_name() }}</p>
                                </div>
                                <div class="col-sm-7 cl-md-8">
                                    <p>INFOS</p>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>

                    <div class="p-5">
                        <a href="{{ route('profile.create') }}" class="btn btn-primary btn-lg btn-block" role="button" >
                            <i class="fas fa-plus"></i> {{  __('Add one') }}
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
