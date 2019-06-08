@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="mb-5">
        <h1 class="h3 mb-4 text-gray-600">@lang('Participants')</h1>
    </div>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card o-hidden border-0 shadow-lg">

                <div class="card-body p-0">

                    <div class="list-group list-group-flush">
                        @foreach ($profiles as $profile)
                        <a href="{{ route("profile.show", ["profile" => $profile]) }}" class="list-group-item list-group-item-action">
                            <div class="row">
                                <div class="col-md-2 text-center">
                                    <img class="img-fluid rounded-circle bg-white p-1" style="width: 4rem;" src="https://robohash.org/{{ $profile->slug() }}?set=set4&amp;size=128x128" alt="">
                                </div>
                                <div class="col-md-5">
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
                                <div class="col-md-5">
                                    <div class="m-1">
                                        <h6><i class="fas fa-user text-info"></i> {{ $profile->user->name }}</h6>
                                        <p class="m-0">
                                            <i class="fas fa-at text-info"></i>
                                            {{ $profile->user->email }}
                                        </p>
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
