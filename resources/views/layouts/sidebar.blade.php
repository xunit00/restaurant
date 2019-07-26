<aside class="main-sidebar sidebar-dark-success elevation-4">
        <!-- Brand Logo -->
        <a href="{{ url('/') }}" class="brand-link">
            <img src="{{asset('img/patio.png')}}" alt="Patio Logo"
                class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light"> {{ config('app.name', 'Restaurant El Patio') }}</span>
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
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    @can(['read.users','read.permissions','read.role'])
                    <li class="nav-item has-treeview">

                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Administracion<i class="right fa fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('read.users')
                            <li class="nav-item">
                                <a href="{{route('users.index')}}"
                                class="nav-link {{ request()->is('users*') ? 'active' : '' }}">
                                    <i class="fas fa-circle-notch nav-icon"></i>
                                    <p>Usuarios</p>
                                <a>
                            </li>
                            @endcan

                            @can('read.permissions')
                            <li class="nav-item">
                                <a href="{{route('permissions.index')}}"
                                class="nav-link {{ request()->is('permissions*') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-circle-notch"></i>
                                    <p>Permisos</p>
                                </a>
                            </li>
                            @endcan()

                            @can('read.role')
                            <li class="nav-item">
                                <a href="{{route('roles.index')}}"
                                class="nav-link {{ request()->is('roles*') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-circle-notch"></i>
                                    <p>Roles</p>
                                </a>
                            </li>
                            @endcan()

                        </ul>
                    </li>
                    @endcan


                    @can(['read.categorias','read.unidades','read.productos'])
                    <li class="nav-item has-treeview">

                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-boxes"></i>
                            <p>Inventario
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('read.categorias')
                            <li class="nav-item">
                                <a href="{{route('categorias.index')}}"
                                class="nav-link {{ request()->is('categorias*') ? 'active' : '' }}">
                                <i class="fas fa-circle-notch nav-icon"></i>
                                    <p>Categorias</p>
                                <a>
                            </li>
                            @endcan

                            @can('read.unidades')
                            <li class="nav-item">
                                <a href="{{route('unidades.index')}}"
                                class="nav-link {{ request()->is('unidades*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-circle-notch"></i>
                                    <p>Unidades</p>
                                </a>
                            </li>
                            @endcan()

                            @can('read.productos')
                            <li class="nav-item">
                                <a href="{{route('productos.index')}}"
                                class="nav-link {{ request()->is('productos*') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-circle-notch"></i>
                                    <p>Productos</p>
                                </a>
                            </li>
                            @endcan()
                            </ul>
                    </li>
                    @endcan


                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-file-contract"></i>
                            <p>Clientes<i class="right fa fa-angle-left"></i></p>
                        </a>
                            <ul class="nav nav-treeview">
                                {{-- @can('read.users') --}}
                                <li class="nav-item">
                                    <a href="{{ route('user.orders') }}"
                                    class="nav-link {{ request()->is('categorias*') ? 'active' : '' }}">
                                        <i class="fas fa-circle-notch nav-icon"></i>
                                        <p>Mis Ordenes</p>
                                    <a>
                                </li>
                                {{-- @endcan --}}

                                {{-- @can('read.permissions') --}}
                                <li class="nav-item">
                                    <a href="{{route('user.orders.create')}}"
                                    class="nav-link {{ request()->is('unidades*') ? 'active' : '' }}">
                                            <i class="nav-icon fas fa-circle-notch"></i>
                                        <p>Crear Orden</p>
                                    </a>
                                </li>
                                {{-- @endcan() --}}

                                {{-- @can('read.permissions') --}}
                                <li class="nav-item">
                                    <a href="{{route('admin.orders')}}"
                                    class="nav-link {{ request()->is('productos*') ? 'active' : '' }}">
                                            <i class="nav-icon fas fa-circle-notch"></i>
                                        <p>Administrar Orden</p>
                                    </a>
                                </li>
                                {{-- @endcan() --}}

                            </ul>
                </li>


                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
