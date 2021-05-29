@extends('layouts.structure')

@section('app')
<body class="bg-image-main">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark mb-4">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>

                <div class="d-flex flex-row order-2 order-md-3">
                    <button class="navbar-toggler mr-3" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <i class="fas fa-bars"></i>
                    </button>
                    <x-lang-dropdown />
                </div>

                <div class="collapse navbar-collapse order-3 order-md-2" id="navbarNavDropdown">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                @include('layouts.components.navbar-user')
                            @endguest
                        </div>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="my-5">
            @include('layouts.alerts')
            @yield('content')
        </main>
    </div>
</body>
@endsection
