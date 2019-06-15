@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="mb-5">
        <h1 class="h3 mb-4 text-gray-600">@lang('Editions')</h1>
    </div>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card o-hidden border-0 shadow-lg">

                <div class="card-body p-0">
                    @if ($editions->isNotEmpty())
                    <div class="list-group list-group-flush">
                        @foreach ($editions as $edition)
                        <a href="{{ route("edition.edit", ['edition' => $edition]) }}" class="list-group-item list-group-item-action">
                            <div class="row">
                                <div class="col-md-2 text-center">
                                    <div class="p-1 d-inline-flex bg-primary text-white font-weight-bold justify-content-center rounded-circle" style="width: 4rem; height: 4rem;">
                                        <div class="d-inline-block align-self-center">{{ $edition->id }}</div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="m-1">
                                        <h6 class="font-weight-bold text-center text-md-left text-primary">{{ $edition->trail_date->isoFormat('LL') }}</h6>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="m-1">
                                        <p class="m-0">
                                            <i class="fas fa-life-ring text-info"></i>
                                            {{ $edition->helper_subscriptions_open->isoFormat('LL') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                    @else
                    <div class="alert alert-light" role="alert">
                        {{ __('No editions yet. Create one!') }}
                    </div>
                    <div>
                        <a href="{{ route('edition.create') }}" class="btn btn-primary btn-lg btn-block" role="button" >
                            <i class="fas fa-plus"></i> {{  __('Add one') }}
                        </a>
                    </div>
                    @endif

                    <div class="p-5">
                        {{ $editions->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
