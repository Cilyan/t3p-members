<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <!-- Placeholder -->
        </div>
    </a>

    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>@lang("Dashboard")</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        @lang('Editions')
    </div>

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('edition.create') }}">
            <i class="fas fa-fw fa-plus"></i>
            <span>@lang("Add one")</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        @lang('Users')
    </div>

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.accounts') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>@lang("Accounts")</span>
        </a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.profiles') }}">
            <i class="fas fa-fw fa-address-card"></i>
            <span>@lang("Profiles")</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

</ul>
