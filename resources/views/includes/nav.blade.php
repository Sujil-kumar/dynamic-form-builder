<nav class="navbar navbar-expand-lg navbarCustom px-md-4 px-2  py-2 sticky-top">
    <a class="navbar-brand" href="{{ url('/') }}">
        <span class="fw-bold">Dynamic Form Builder</span> 
    </a>
    <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarContent">
        <ul class="navbar-nav ms-auto align-items-lg-center me-5">
            <li class="nav-item">
                <a class="nav-link {{ request()->is('user*') ? 'active' : '' }}" href="{{ route('user.dashboard') }}">User Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('admin*') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
            </li>
        </ul>
    </div>
</nav>