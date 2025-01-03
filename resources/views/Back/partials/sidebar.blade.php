<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="index.html" class="logo">
                <img src="img/kaiadmin/logo_light.svg" alt="navbar brand" class="navbar-brand" height="20" />
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <!-- Dashboard Section -->
                <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <!-- Test Page Section -->

                
                <li class="nav-item {{ request()->routeIs('role.index') ? 'active' : '' }}">
                    <a href="{{ route('role.index') }}">
                        <i class="fas fa-file-alt"></i>
                        <p>gestion des roles</p>
                    </a>
                </li>

                
                <li class="nav-item {{ request()->routeIs('produit.index') ? 'active' : '' }}"> 
    <a href="{{ route('produit.index') }}">
        <i class="fas fa-file-alt"></i>
        <p>Gestion des Produits</p>
    </a>
</li>



                <li class="nav-item {{ request()->routeIs('users.index') ? 'active' : '' }}">
                    <a href="{{ route('users.index') }}">
                        <i class="fas fa-file-alt"></i>
                        <p>gestion des users</p>
                    </a>
                </li>

                <li class="nav-item {{ request()->routeIs('test4') ? 'active' : '' }}">
                    <a href="#">
                        <i class="fas fa-file-alt"></i>
                        <p>gestion</p>
                    </a>
                </li>

                <li class="nav-item {{ request()->routeIs('test5') ? 'active' : '' }}">
                    <a href="#">
                        <i class="fas fa-file-alt"></i>
                        <p>gestion</p>
                    </a>
                </li>


                <li class="nav-item {{ request()->routeIs('test6') ? 'active' : '' }}">
                    <a href="#">
                        <i class="fas fa-file-alt"></i>
                        <p>gestion</p>
                    </a>
                </li>
            </ul>

            <!-- Logout Form -->
            <div class="mt-4">
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <a href="{{ route('logout') }}"
           onclick="event.preventDefault(); this.closest('form').submit();"
           class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
            {{ __('Log Out') }}
        </a>
    </form>
</div>

            <!-- End Logout Form -->
        </div>
    </div>
</div>
