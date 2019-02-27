@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">{{ __('Edition') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ $edit ? route('edition.update', ['edition' => $edition]) : route('edition.store') }}">
                        @csrf
                        @if ($edit)
                            @method('PATCH')
                        @endif

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="id">{{ __('Year') }}<span class="text-danger">*</span></label>
                                <input
                                    id="id" type="number" min="2000"
                                    class="form-control{{ $errors->has('id') ? ' is-invalid' : '' }}"
                                    name="id"
                                    value="{{ old('id', $edition->id ?? null) }}"
                                    required autofocus
                                    {{ $edit ? "disabled" : "" }}
                                >

                                @if ($errors->has('id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('id') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="trail_date">{{ __('Date of the Trail') }}<span class="text-danger">*</span></label>
                                <input id="trail_date" type="date" class="form-control{{ $errors->has('trail_date') ? ' is-invalid' : '' }}" name="trail_date" value="{{ old('trail_date', $edition->trail_date ?? null) }}" required>

                                @if ($errors->has('trail_date'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('trail_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="helper_subscriptions_open">{{ __('Helpers Subscription Open Date') }}</label>
                                <input id="helper_subscriptions_open" type="date" class="form-control{{ $errors->has('helper_subscriptions_open') ? ' is-invalid' : '' }}" name="helper_subscriptions_open" value="{{ old('helper_subscriptions_open', $edition->helper_subscriptions_open ?? null) }}">

                                @if ($errors->has('helper_subscriptions_open'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('helper_subscriptions_open') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            @if($edit)
                                <div class="col-md-6 pb-3 pb-md-0">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        <i class="fas fa-edit"></i> {{  __('Edit') }}
                                    </button>
                                </div>
                                <div class="col-6 col-md-3">
                                    <a href="{{ route('admin.home') }}" class="btn btn-light btn-block" role="button">
                                        <i class="fas fa-times"></i> {{  __('Cancel') }}
                                    </a>
                                </div>
                                <div class="col-6 col-md-3">
                                    <a href="{{ route("edition.delete", ['edition' => $edition])}}" class="btn btn-danger btn-block" role="button">
                                        <i class="fas fa-trash-alt"></i> {{  __('Remove') }}
                                    </a>
                                </div>
                            @else
                                <div class="col-sm-8 pb-3 pb-sm-0">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        <i class="fas fa-plus"></i> {{  __('Add') }}
                                    </button>
                                </div>
                                <div class="col-sm-4">
                                    <a href="{{ route('admin.home') }}" class="btn btn-light btn-block" role="button">
                                        <i class="fas fa-times"></i> {{  __('Cancel') }}
                                    </a>
                                </div>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
