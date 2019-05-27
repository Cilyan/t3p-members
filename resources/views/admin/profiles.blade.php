@extends('layouts.app')

@section('content')
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
                        <a href="{{ route("profile.show", ["profile" => $profile]) }}" class="list-group-item list-group-item-action">
                            <div class="row">
                                <div class="col-md-3 text-center">
                                    <img class="img-fluid rounded-circle bg-white p-1" style="width: 4rem;" src="https://robohash.org/{{ $profile->slug() }}?set=set4&amp;size=128x128" alt="">
                                </div>
                                <div class="col-md-9">
                                    <div class="m-1">
                                        <h6 class="font-weight-bold text-center text-md-left text-primary">{{ $profile->full_name() }}</h6>
                                        @php
                                            $helpers = $profile->helpers_active;
                                        @endphp
                                        @if($helpers->count() > 0)
                                            @foreach ($helpers as $helper)
                                            <p class="m-0">
                                                <i class="fas fa-check text-success"></i>
                                                @lang("Registered as helper for the :edition edition!", ["edition" => $helper->edition_id])
                                            </p>
                                            @endforeach
                                        @else
                                            <p class="m-0">
                                                <i class="fas fa-life-ring text-gray-400"></i>
                                                @lang("Currently not registered as helper.")
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>

                    <div class="p-5">
                        {{ $profiles->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
