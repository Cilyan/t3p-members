@extends('layouts.wizard')

@section('wizard_content')
    <div class="text-center mb-5">
        <h1 class="h4 text-gray-900 mb-4">@lang('Remove participant')</h1>
        <p>
            @lang('Are you sure you want to remove this profile?')
        </p>
        <p class="text-danger"><strong>{{ $profile->full_name() }}</strong></p>
        <div class="d-none d-sm-block">
            <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 15rem;" src="{{ asset('svg/undraw_in_thought_gjsf.svg') }}" alt="">
        </div>
    </div>

    <form method="POST" action="{{ route('profile.destroy', ['profile' => $profile]) }}">
        @csrf
        @method('DELETE')
        <div class="form-group row flex-row-reverse align-items-center justify-content-start pt-3">
            <div class="col-sm-8 pb-3 pb-sm-0">
                <button type="submit" class="btn btn-danger btn-block">
                    <i class="fas fa-trash-alt"></i> {{  __('Remove') }}
                </button>
            </div>
            <div class="col-sm-4">
                <a href="{{ route("profile.show", ["profile" => $profile]) }}" class="btn btn-light btn-block" role="button">
                    <i class="fas fa-times"></i> {{  __('Cancel') }}
                </a>
            </div>
        </div>
    </form>
@endsection
