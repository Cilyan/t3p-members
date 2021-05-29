@extends('layouts.structure')

@section('app')
<body class="bg-image-main">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark mb-4">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>
        </nav>

        <main class="my-5">
            @include('layouts.alerts')
            <div class="header-message text-center my-5">
                <h1>
                    <strong>Trail des 3 Pics</strong>
                </h1>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="card o-hidden border-0 shadow-lg">
                            <div class="card-body p-0">
                                <div class="text-center p-5">
                                    <h1 class="h4 text-gray-900">@lang('Maintenance')</h1>
                                    <div class="d-none d-sm-block">
                                        <img class="img-fluid px-4 mt-4" style="width: 15rem;" src="{{ asset('svg/undraw_server_down_s4lk.svg') }}" alt="">
                                    </div>
                                    <p class="mt-4">
                                        @lang('We will be back very soon! Thank you for your patience.')
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
@endsection
