@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-4 text-gray-600">@lang('Administration')</h1>
        <a href="{{ route('admin.export', ['edition' => $current_edition]) }}" class="btn btn-primary"><i class="fas fa-download"></i> @lang("Export Helpers")</a>
    </div>
    <div class="row">
        <div class="d-none d-lg-block col-lg-4 col-md-6 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">@lang("Accounts")</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $users_count }}</div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-users fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">@lang("Profiles")</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $profiles_count }}</div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-address-card fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">@lang("Helpers")</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $helpers_count }}</div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-life-ring fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="card shadow">
                <div class="card-header">
                    <h6 class="my-1 font-weight-bold">
                        @lang('Editions')
                    </h6>
                </div>

                <div class="card-body">
                    @if ($editions->isNotEmpty())
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tbody>
                                    @foreach ($editions as $edition)
                                        <tr>
                                            <td>{{ $edition->id }}</td>
                                            <td>{{ $edition->trail_date->isoFormat('LL') }}</td>
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
        <div class="d-none d-lg-block col-lg-6 mb-4">
            <!-- Illustrations -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold">
                      {{ config('app.name', 'Laravel') }}
                  </h6>
                </div>
                <div class="card-body">
                  <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="{{ asset('svg/undraw_finish_line_katerina_limpitsouni_xy20.svg') }}" alt="">
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
