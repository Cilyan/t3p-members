@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow mt-4">
                <div class="card-header">
                    <h6 class="my-1 font-weight-bold text-danger">
                        @lang('Remove edition')
                    </h6>
                </div>
                <div class="card-body">
                    <p class="card-text">{{ __('Are you sure you want to remove this edition?') }}</p>
                    <p class="card-text">{{ $edition->id}}</p>
                    <form method="POST" action="{{ route('edition.destroy', ['edition' => $edition]) }}">
                        @csrf
                        @method('DELETE')
                        <div class="form-group row">
                            <div class="col-sm-8 pb-3 pb-sm-0">
                                <button type="submit" class="btn btn-danger btn-block">
                                    <i class="fas fa-trash-alt"></i> {{  __('Remove') }}
                                </button>
                            </div>
                            <div class="col-sm-4">
                                <a href="{{ route('edition.edit', ['edition' => $edition]) }}" class="btn btn-light btn-block" role="button">
                                    <i class="fas fa-times"></i> {{  __('Cancel') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
