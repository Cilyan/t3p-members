@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="h3 mb-4 text-white">{{ $profile->full_name() }}</h1>
    <div class="row justify-content-center">
        <div class="col-lg-6 col-xl-7 pb-3 pb-lg-0">
            <div class="card shadow">
                <div class="card-header">
                    <h6 class="my-1 font-weight-bold">
                        {{ $profile->full_name() }}
                    </h6>
                </div>

                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-3">{{ __('Birthday') }}</dt>
                        <dd class="col-sm-9">{{ $profile->birthday->isoFormat('LL') }}</dd>

                        <dt class="col-sm-3">{{ __('Address') }}</dt>
                        <dd class="col-sm-9">
                            <p>
                                @if($profile->thoroughfare){{ $profile->thoroughfare }}<br>@endif
                                @if($profile->premise){{ $profile->premise }}<br>@endif
                                @if($profile->postal_code || $profile->locality){{ $profile->postal_code }} {{ $profile->locality }}<br>@endif
                                @if($profile->administrative_area || $profile->country){{ $profile->administrative_area }} {{ $profile->country }}@endif
                            </p>
                        </dd>

                        <dt class="col-sm-3">{{ __('Phone') }}</dt>
                        <dd class="col-sm-9">{{ $profile->phone }}</dd>

                        @if ($profile->tshirt_gender)
                            <dt class="col-sm-3">{{ __('T-shirt') }}</dt>
                            <dd class="col-sm-9">
                                {{ $profile->tshirt_gender == "M" ? __('Man') : __('Woman') }}
                                {{ strtoupper($profile->tshirt_size) }}
                            </dd>
                        @endif
                    </dl>
                    <div class="row">
                        <div class="col-sm-8 pb-3 pb-sm-0">
                            <a href="{{ route('profile.edit', ['profile' => $profile]) }}" class="btn btn-primary btn-block" role="button" >
                                <i class="fas fa-edit"></i> {{  __('Edit') }}
                            </a>
                        </div>
                        <div class="col-sm-4">
                            <a href="{{ route("profile.delete", ['profile' => $profile])}}" class="btn btn-danger btn-block" role="button">
                                <i class="fas fa-trash-alt"></i> {{  __('Remove') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xl-5">
            <div class="card shadow">
                <div class="card-header">
                    <h6 class="my-1 font-weight-bold">
                        @lang('Become Helper')
                    </h6>
                </div>

                <div class="list-group list-group-flush">
                    @foreach ($editions as $edition)
                        <div class="list-group-item">
                            <div class="row">
                                <div class="col-md-4 pb-2 pb-md-0">{{ $edition->trail_date->isoFormat('LL') }}</div>
                                <div class="col-md-8">
                                    <a href="{{ route('helper.create', ['profile' => $profile, 'edition' => $edition]) }}" class="btn btn-primary btn-block" role="button" >
                                        <i class="fas fa-plus"></i> {{  __('Be helper') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @foreach ($helpers as $helper)
                        <div class="list-group-item">
                            <div class="row">
                                <div class="col-md-4 pb-2 pb-md-0">{{ $helper->edition->trail_date->isoFormat('LL') }}</div>
                                <div class="col-md-5 pb-3 pb-md-0">
                                    @if ($helper->active)
                                        <form method="POST" action="{{ route('helper.deactivate', ['helper' => $helper]) }}">
                                            @csrf
                                            <button type="submit" class="btn btn-success btn-block">
                                                <i class="fas fa-check-square"></i> {{  __('Available') }}
                                            </button>
                                        </form>
                                    @else
                                        <form method="POST" action="{{ route('helper.activate', ['helper' => $helper]) }}">
                                            @csrf
                                            <button type="submit" class="btn btn-light btn-block">
                                                <i class="fas fa-square"></i> {{  __('Not available') }}
                                            </button>
                                        </form>
                                    @endif
                                </div>
                                <div class="col-md-3">
                                    <a href="{{ route('helper.edit', ['helper' => $helper]) }}" class="btn btn-primary btn-block" role="button" >
                                        <i class="fas fa-edit"></i> {{  __('Edit') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
