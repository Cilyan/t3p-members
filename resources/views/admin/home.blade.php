@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __("Editions") }}</div>

                <div class="card-body">
                    @if ($editions->isNotEmpty())
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tbody>
                                    @foreach ($editions as $edition)
                                        <tr>
                                            <td>{{ $edition->id }}</td>
                                            <td>{{ $edition->trail_date }}</td>
                                            <td class="text-right">
                                                <a href="{{ route('edition.edit', ['edition' => $edition]) }}" class="btn btn-secondary" role="button">
                                                    <i class="fas fa-edit"></i><span class="d-none d-sm-inline"> {{  __('Edit') }}</span>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-light" role="alert">
                            {{ __('No editions yet. Create one!') }}
                        </div>
                    @endif
                    <div>
                        <a href="{{ route('edition.create') }}" class="btn btn-primary btn-lg btn-block" role="button" >
                            <i class="fas fa-plus"></i> {{  __('Add one') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
