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
                {{-- <div class="image">
                    <img src="{{ asset('storage/imageng/profile/'.Auth::user()->photo)}}" class="img-circle elevation-2"
                        alt="User Image">
                </div> --}}
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

                     @role('Super-Admin')
                    <li class="nav-item has-treeview">

                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-list-alt"></i>
                            <p>Administracion<i class="right fa fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('read.users')
                            <li class="nav-item">
                                <a href="{{route('admin.users.index')}}"
                                class="nav-link {{ request()->is('users*') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-circle-notch"></i>
                                    <p>Users</p>
                                </a>
                            </li>
                            @endcan

                            @can('read.role')
                            <li class="nav-item">
                                <a href="{{route('admin.roles.index')}}"
                                class="nav-link {{ request()->is('roles*') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-circle-notch"></i>
                                    <p>Roles</p>
                                </a>
                            </li>
                            @endcan

                        </ul>
                    </li>
                    @endrole


                    @canany(['read.categorias','read.unidades','read.productos','read.recetas','read.areas','read.mesas'])
                    <li class="nav-item has-treeview">

                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-cogs"></i>
                            <p>Configuracion
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('read.categorias')
                            <li class="nav-item">
                                <a href="{{route('catInsumo.index')}}"
                                class="nav-link {{ request()->is('categorias*') ? 'active' : '' }}">
                                <i class="fas fa-circle-notch nav-icon"></i>
                                    <p>Categorias Insumos</p>
                                <a>
                            </li>
                            @endcan

                            @can('read.categorias')
                            <li class="nav-item">
                                <a href="{{route('catProductos.index')}}"
                                class="nav-link {{ request()->is('categorias*') ? 'active' : '' }}">
                                <i class="fas fa-circle-notch nav-icon"></i>
                                    <p>Categorias Producto</p>
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
                                <a href="{{route('insumos.index')}}"
                                class="nav-link {{ request()->is('insumos*') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-circle-notch"></i>
                                    <p>Insumos</p>
                                </a>
                            </li>
                            @endcan()

                            @can('read.productos')
                            <li class="nav-item">
                                <a href="{{route('productos.index')}}"
                                class="nav-link {{ request()->is('productos *') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-circle-notch"></i>
                                    <p>Productos</p>
                                </a>
                            </li>
                            @endcan()

                            @can('read.recetas')
                            <li class="nav-item">
                                <a href="{{ route('recetas.index') }}"
                                class="nav-link {{ request()->is('recetas*') ? 'active' : '' }}">
                                <i class="fas fa-circle-notch nav-icon"></i>
                                <p>Recetas</p>
                                <a>
                            </li>
                            @endcan

                            @can('read.areas')
                            <li class="nav-item">
                                    <a href="{{ route('areas.index') }}"
                                    class="nav-link {{ request()->is('areas*') ? 'active' : '' }}">
                                    <i class="fas fa-circle-notch nav-icon"></i>
                                    <p>Areas</p>
                                    <a>
                                </li>
                                @endcan

                                @can('read.mesas')
                            <li class="nav-item">
                                    <a href="{{ route('mesas.index') }}"
                                    class="nav-link {{ request()->is('mesas*') ? 'active' : '' }}">
                                    <i class="fas fa-circle-notch nav-icon"></i>
                                    <p>Mesas</p>
                                    <a>
                                </li>
                                @endcan

                            </ul>
                    </li>
                    @endcanany




                    @can(['read.comprobantes'])
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file-contract"></i>
                        <p>Comprobantes<i class="right fa fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('read.comprobantes')
                        <li class="nav-item">
                            <a href="{{ route('comprobanteTipo.index') }}"
                            class="nav-link {{ request()->is('comprobanteTipo*') ? 'active' : '' }}">
                            <i class="fas fa-circle-notch nav-icon"></i>
                            <p>Serie/Tipo</p>
                            <a>
                        </li>
                        @endcan

                        @can('read.comprobantes')
                        <li class="nav-item">
                            <a href="{{ route('comprobanteSecuencia.index') }}"
                            class="nav-link {{ request()->is('comprobanteSecuencia*') ? 'active' : '' }}">
                            <i class="fas fa-circle-notch nav-icon"></i>
                            <p>Secuencia</p>
                            <a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcan

                @can('read.clientes')
                <li class="nav-item">
                    <a href="{{ route('clientes.index') }}"
                    class="nav-link {{ request()->is('clientes*') ? 'active' : '' }}">
                    <i class="fas fa-user-friends nav-icon"></i>
                    <p>Cliente</p>
                    <a>
                </li>
                @endcan

                @can(['read.comprobantes'])
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-boxes"></i>
                        <p>Inventario<i class="right fa fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('read.comprobantes')
                        <li class="nav-item">
                            <a href="{{ route('transacciones.index') }}"
                            class="nav-link {{ request()->is('comprobanteTipo*') ? 'active' : '' }}">
                            <i class="fas fa-circle-notch nav-icon"></i>
                            <p>Entrada/salida</p>
                            <a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcan


                @canany(['read.clientes','read.notaVenta'])
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>Ventas<i class="right fa fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('read.comprobantes')
                        <li class="nav-item">
                            <a href="{{ route('notaVentas.index') }}"
                            class="nav-link {{ request()->is('notaventas*') ? 'active' : '' }}">
                            <i class="fas fa-circle-notch nav-icon"></i>
                            <p>Nota de Venta</p>
                            <a>
                        </li>
                        @endcan

                        @can('read.notaVenta')
                        <li class="nav-item">
                            <a href="{{ route('comprobanteSecuencia.index') }}"
                            class="nav-link {{ request()->is('comprobanteSecuencia*') ? 'active' : '' }}">
                            <i class="fas fa-circle-notch nav-icon"></i>
                            <p>Facturacion C.F</p>
                            <a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcanany


                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
