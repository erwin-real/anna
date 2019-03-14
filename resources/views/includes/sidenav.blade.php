
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
        <a class="nav-link" href="/">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <li class="nav-item {{ request()->is('companyInfo') || request()->is('companyInfo/*') ? 'active' : '' }}">
        <a class="nav-link" href="/companyInfo">
            <i class="fas fa-fw fa-info"></i>
            <span>Company Information</span></a>
    </li>
    <li class="nav-item {{ request()->is('customers') || request()->is('customers/*') ? 'active' : '' }}">
        <a class="nav-link" href="/customers">
            <i class="fas fa-fw fa-user-tie"></i>
            <span>Customers</span></a>
    </li>
    <li class="nav-item {{ request()->is('suppliers') || request()->is('suppliers/*') ? 'active' : '' }}">
        <a class="nav-link" href="/suppliers">
            <i class="fas fa-fw fa-users-cog"></i>
            <span>Suppliers</span></a>
    </li>
    <li class="nav-item {{ request()->is('materials') || request()->is('materials/*') ? 'active' : '' }}">
        <a class="nav-link" href="/materials">
            <i class="fas fa-fw fa-puzzle-piece"></i>
            <span>Materials</span></a>
    </li>
    <li class="nav-item {{ request()->is('products') || request()->is('products/*') ? 'active' : '' }}">
        <a class="nav-link" href="/products">
            <i class="fas fa-fw fa-stamp"></i>
            <span>Products</span></a>
    </li>
    <li class="nav-item {{ request()->is('users') || request()->is('users/*') ? 'active' : '' }}">
        <a class="nav-link" href="/users">
            <i class="fas fa-fw fa-users"></i>
            <span>Users</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->