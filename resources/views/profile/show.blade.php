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
                    <div class="row border-bottom border-primary">
                        <div class="col-md-4 text-center bg-gradient-side-primary">
                            <img class="img-fluid rounded bg-white my-3 mt-md-4 p-1" style="width: 7rem;" src="https://robohash.org/{{ $profile->slug() }}?set=set4&amp;size=128x128" alt="">
                        </div>
                        <div class="col-md-8">
                            <div class="m-3 mr-md-4">
                                <h1 class="h4 text-gray-900 border-bottom border-primary mb-4">{{ $profile->full_name() }}</h1>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h6 class="font-weight-bold">@lang('Birthday')</h6>
                                        <p>{{ $profile->birthday->isoFormat('LL') }}</p>
                                        <h6 class="font-weight-bold">@lang('T-shirt')</h6>
                                        <p>
                                                {{ $profile->tshirt_gender == "M" ? __('Man') : __('Woman') }}
                                                {{ strtoupper($profile->tshirt_size) }}
                                        </p>
                                    </div>
                                    <div class="col-sm-6">
                                        <h6 class="font-weight-bold">@lang('Contact')</h6>
                                        <p>
                                            @if($profile->thoroughfare){{ $profile->thoroughfare }}<br>@endif
                                            @if($profile->premise){{ $profile->premise }}<br>@endif
                                            @if($profile->postal_code || $profile->locality || $profile->administrative_area || $profile->country){{ $profile->postal_code }} {{ $profile->locality }} {{ $profile->administrative_area }} {{ $profile->country }} <br>@endif
                                            @if($profile->phone) {{ $profile->phone }} @endif
                                        </p>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-8 pb-3 pb-sm-0">
                                        <a href="{{ route('profile.edit', ['profile' => $profile]) }}" class="btn btn-primary btn-block btn-sm" role="button" >
                                            <i class="fas fa-edit"></i> {{  __('Edit') }}
                                        </a>
                                    </div>
                                    <div class="col-sm-4">
                                        <a href="{{ route("profile.delete", ['profile' => $profile])}}" class="btn btn-danger btn-block btn-sm" role="button">
                                            <i class="fas fa-trash-alt"></i> {{  __('Remove') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body pb-1">
                        <h1 class="h4 text-gray-900 border-bottom mb-4">@lang("Helper")</h1>
                        @if($helpers->count() > 0)
                            @foreach ($helpers as $helper)
                            <p class="mb-1">
                                <i class="fas fa-check text-success"></i>
                                @lang(":name is registered as helper for the edition of the :edition!", ["name" => $profile->full_name(), "edition" => $helper->edition->trail_date->isoFormat('LL')])
                            </p>
                            <p class="text-right">
                                <a href="{{ route('helper.edit', ['helper' => $helper]) }}" class="text-primary">
                                    <i class="fas fa-edit"></i> {{  __('Edit') }}
                                </a>&nbsp;
                                <a href="{{ route('helper.delete', ['helper' => $helper]) }}" class="text-danger">
                                    <i class="fas fa-trash-alt"></i> {{  __('Remove') }}
                                </a>
                            </p>
                            @endforeach
                        @else
                            <p>
                                @lang(":name is not currently registered as helper.", ["name" => $profile->full_name()])
                            </p>
                        @endif

                        @foreach ($editions as $edition)
                            <p class="mb-1">
                                <i class="fas fa-lightbulb text-warning"></i>
                                @lang("Subscriptions are opened for the edition of the :edition", ["edition" => $edition->trail_date->isoFormat('LL') ])
                            </p>
                            <p class="text-right">
                                <a href="{{ route('helper.create', ['profile' => $profile, 'edition' => $edition, 'wizard' => false]) }}" class="text-primary" >
                                    <i class="fas fa-life-ring"></i> {{  __('Be helper') }}
                                </a>
                            </p>
                        @endforeach
                    </div>

                    <hr>

                    <div class="text-center mt-4 mb-5">
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
@endsection
