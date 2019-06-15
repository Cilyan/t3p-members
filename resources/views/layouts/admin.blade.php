@extends('layouts.structure')

@push('scripts')
    <script src="{{ asset('js/admin.js') }}" defer></script>
@endpush

@section('app')
<body>
    <!-- Page Wrapper -->
    <div id="wrapper">

        @include('layouts.components.admin.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                @include('layouts.components.admin.topbar')

                <main class="my-5">
                    @include('layouts.alerts')
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
    @stack('admin-scripts')
</body>
@endsection
