<?php
/*
<!-- Sidebar Toggle (Topbar) -->

*/
?>

<nav class="navbar navbar-expand-md navbar-light bg-white mb-4 shadow">
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fas fa-bars"></i>
    </button>

    <a class="navbar-brand" href="{{ url('/') }}">
        {{ config('app.name', 'Laravel') }}
    </a>

    <div class="d-flex flex-row order-2 order-md-3">
        <button class="btn btn-link d-md-none rounded-circle mr-3" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <i class="fas fa-user"></i>
        </button>
        <x-lang-dropdown />
    </div>

    <div class="collapse navbar-collapse order-3 order-md-2" id="navbarNavDropdown">
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
            @include('layouts.components.navbar-user')
        </ul>
    </div>
</nav>
