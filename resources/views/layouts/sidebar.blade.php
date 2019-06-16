<aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{ url('/') }}" class="brand-link">
            <img src="{{asset('/admin-lte/dist/img/patio.png')}}" alt="Patio Logo"
                class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light"> {{ config('app.name', 'Restaurant') }}</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    {{-- <img src="{{ asset('storage/img/profile/'.Auth::user()->photo)}}" class="img-circle elevation-2"
                        alt="User Image"> --}}
                </div>
                <div class="info">
                    <a href="#" class="d-block">
                        {{Auth::user()->name}} /
                        {{Auth::user()->roles->implode('name',', ')}}
                    </a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="{{route('dashboard.index')}}"
                        class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt green"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <li class="nav-item has-treeview {{ request()->is('users*'&&'permissions*') ? 'menu-open' : 'menu-close' }}">

                        <a href="#" class="nav-link {{ request()->is('users*'&&'permissions*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-cog"></i>
                            <p>
                                Adm. de Usuarios
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('read.users')
                            <li class="nav-item">
                                <a href="{{route('users.index')}}"
                                class="nav-link {{ request()->is('users*') ? 'active' : '' }}">
                                    <i class="fa fa-users nav-icon orange"></i>
                                    <p>Users Page</p>
                                <a>
                            </li>
                            @endcan

                            @can('read.permissions')
                            <li class="nav-item">
                                <a href="{{route('permissions.index')}}"
                                class="nav-link {{ request()->is('permissions*') ? 'active' : '' }}">
                                        <i class="nav-icon fa fa-scroll red"></i>
                                    <p>Permisos</p>
                                </a>
                            </li>
                            @endcan()

                            @can('read.role')
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                        <i class="nav-icon fa fa-user-tag green"></i>
                                    <p>Roles</p>
                                </a>
                            </li>
                            @endcan()
                        </ul>
                    </li>


                    <li class="nav-item">
                        <a href="" tag="a" class="nav-link">
                            <i class="nav-icon fa fa-cogs yellow"></i>
                            <p>Developer</p>
                        </a>
                    </li>



                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
