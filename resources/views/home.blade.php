@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="h3 mb-4 text-gray-800">@lang('Home')</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header">
                    <h6 class="my-1 font-weight-bold">
                        @lang('Participants')
                    </h6>
                </div>

                <div class="card-body">
                    @if ($profiles->isNotEmpty())
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tbody>
                                    @foreach ($profiles as $profile)
                                        <tr>
                                            <td><img src="https://robohash.org/{{ $profile->slug() }}?set=set4&amp;size=64x64" style="vertical-align: middle; width: 32px; height: 32px;  border-radius: 50%;"></td>
                                            <td>{{ $profile->first_name }}</td>
                                            <td>{{ $profile->last_name }}</td>
                                            <td class="text-right">
                                                <a href="{{ route('profile.show', ['profile' => $profile]) }}" class="btn btn-secondary" role="button">
                                                    <i class="fas fa-eye"></i><span class="d-none d-sm-inline"> {{  __('View') }}</span>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-light" role="alert">
                            {{ __('No participants yet.') }}
                        </div>
                    @endif
                    <div>
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
