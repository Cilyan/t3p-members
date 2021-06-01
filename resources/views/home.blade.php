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
                        <div class="d-none d-sm-block">
                            <img class="img-fluid px-4 mt-4" style="width: 15rem;" src="{{ asset('svg/undraw_into_the_night_vumi.svg') }}" alt="">
                        </div>
                    </div>

                    <div class="list-group list-group-flush">
                        @foreach ($profiles as $profile)
                        <div class="list-group-item list-group-item-action">
                            <div class="row">
                                <a href="{{ route("profile.show", ["profile" => $profile]) }}" class="stretched-link"></a>
                                <div class="col-md-2 text-center">
                                    <img class="img-fluid rounded-circle bg-white p-1" style="width: 4rem;" src="https://robohash.org/{{ $profile->slug() }}?set=set4&amp;size=128x128" alt="">
                                </div>
                                <div class="col-md-10">
                                    <div class="m-1">
                                        <h6 class="font-weight-bold text-center text-md-left text-primary">
                                            {{ $profile->full_name() }}
                                            <small class="float-none float-md-right"><i class="fas fa-edit"></i> @lang("Edit")</small>
                                        </h6>
                                        @foreach ($profile->helpers_active as $helper)
                                        <p class="m-0">
                                            <i class="fas fa-check text-success"></i>
                                            @lang("Registered as helper for the :edition edition!", ["edition" => $helper->edition_id])
                                        </p>
                                        @endforeach
                                        @foreach ($editions($profile) as $edition)
                                        <p class="mb-0">
                                            <i class="fas fa-lightbulb text-warning"></i>
                                            @lang("Subscriptions are opened for the edition of the :edition", ["edition" => $edition->trail_date->isoFormat('LL') ])
                                        </p>
                                        <p class="text-right">
                                            <a href="{{ route('helper.create', ['profile' => $profile, 'edition' => $edition, 'wizard' => false]) }}" class="text-primary position-relative" style="z-index: 5;">
                                                <i class="fas fa-life-ring"></i> {{  __('Be helper') }}
                                            </a>
                                        </p>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
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
