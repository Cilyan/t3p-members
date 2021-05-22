@extends('layouts.admin')

@push('admin-scripts')
    @if ($data != null)
        <script  type="text/javascript">
        var charts_config = [
            {
                id: "#helpersGraphCanvas",
                config: {
                    type: 'line',
                    data: {
                        datasets: [{
                            data: @json($data),
                            backgroundColor: "rgba(78, 115, 223, 0.05)",
                            borderColor: "rgba(78, 115, 223, 1)",
                            pointRadius: 3,
                            pointBackgroundColor: "rgba(78, 115, 223, 1)",
                            pointBorderColor: "rgba(78, 115, 223, 1)",
                            pointHoverRadius: 3,
                            pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                            pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                            pointHitRadius: 10,
                            pointBorderWidth: 2,
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                display: false
                            }
                        },
                        maintainAspectRatio: false,
                        layout: {
                            padding: {
                                left: 10,
                                right: 25,
                                top: 25,
                                bottom: 0
                            }
                        },
                        scales: {
                            xAxes: [{
                                type: 'time',
                                time: {
                                    parser: 'YYYY-MM-DD'
                                }
                            }]
                        },
                        tooltips: {
                            backgroundColor: "rgb(255,255,255)",
                            bodyFontColor: "#858796",
                            titleMarginBottom: 10,
                            titleFontColor: '#6e707e',
                            titleFontSize: 14,
                            borderColor: '#dddfeb',
                            borderWidth: 1,
                            xPadding: 15,
                            yPadding: 15,
                            displayColors: false,
                            intersect: false,
                            mode: 'index',
                            caretPadding: 10
                        }
                    }
                }
            }
        ]
        </script>
    @endif
@endpush

@section('content')
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-4 text-gray-600">@lang('Administration')</h1>
        @if ($current_edition != null)
            <a href="{{ route('admin.export', ['edition' => $current_edition]) }}" class="btn btn-primary"><i class="fas fa-download"></i> @lang("Export Helpers")</a>
        @endif
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
                        @lang('Helpers')
                    </h6>
                </div>

                <div class="card-body">
                    <div class="chart-area" style="min-height: 20rem;">
                        <canvas id="helpersGraphCanvas"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-none d-lg-flex col-lg-6 mb-4 align-items-stretch">
            <!-- Illustrations -->
            <div class="card shadow flex-fill">
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
