@extends('home')
@section('blade')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">

                <ul class="nav nav-pills ml-auto p-2">
                    <li class="nav-item"><a class="nav-link active show" href="#tab_1" data-toggle="tab">Productos</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Unidad Productos</a></li>
                </ul>
            </div><!-- /.col -->

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Lista de Producto</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>


<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-10">
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                        <p>{{ session('success') }}</p>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
            </div>
            <div class="col-md-2">
                <div class="card-tools ">
                    <div class="input-group input-group-sm" style="width: 125px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.card-header -->

    <div class="card-body">
        <div class="tab-content">
            <div class="tab-pane active show" id="tab_1">

        <a class="btn btn-success" href="{{route('productos.create')}}">
        Crear Producto
        <i class="fa fa-th-large"></i>
        </a>

                <div class="card-body table-responsive p-0 mt-3">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Categoria</th>
                                <th>Modyfy</th>
                            </tr>
                            @foreach($productos as $prod)
                            <tr>
                                <td>{{$prod->nombre_producto}}</td>
                                <td>{{$prod->descripcion_producto}}</td>
                                <td>{{$prod->categoria->nombre}}</td>
                                <td>
                                    <form action="{{route('productos.destroy',$prod->id)}}" method="POST">
                                        @can('update.role')
                                        <a class="btn btn-outline-secondary btn-sm"
                                            href="{{route('productos.edit',$prod->id)}}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        @endcan

                                        @csrf
                                        @method('DELETE')
                                        @can('delete.users')
                                        <button type="submit" class="btn btn-outline-danger btn-sm"
                                            onclick="return confirm('Quiere Borrar este Registro?')">
                                            <i class="fas fa-trash-alt"></i></button>
                                        @endcan
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$productos->links()}}
                </div>
                <!-- /.card-body -->

            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_2">


                    <a class="btn btn-success" href="{{route('productos.create_produnid')}}">
                            Crear Unidad/Producto
                            <i class="fa fa-th-large"></i>
                            </a>

                                    <div class="card-body table-responsive p-0 mt-3">
                                        <table class="table table-hover">
                                            <tbody>
                                                <tr>
                                                    <th>Producto</th>
                                                    <th>Unidad</th>
                                                    <th>Cantidad</th>
                                                    <th>Precio Venta</th>
                                                    <th>Costo</th>
                                                    <th>Modyfy</th>
                                                </tr>
                                                @foreach($prod_unidad as $p_unid)
                                                <tr>
                                                {{-- <td>{{}}</td> --}}
                                                    {{-- <td>{{$p_unid->nombre_unidad}}</td>
                                                    <td>{{$p_unid->productos->pivot->cantidad}}</td>
                                                    <td>{{$p_unid->productos->pivot->precio_venta}}</td>
                                                    <td>{{$p_unid->productos->pivot->costo}}</td> --}}
                                                    <td>
                                                        <form action="{{route('productos.destroy',$prod->id)}}" method="POST">
                                                            @can('update.role')
                                                            <a class="btn btn-outline-secondary btn-sm"
                                                                href="{{route('productos.edit',$prod->id)}}">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            @endcan

                                                            @csrf
                                                            @method('DELETE')
                                                            @can('delete.users')
                                                            <button type="submit" class="btn btn-outline-danger btn-sm"
                                                                onclick="return confirm('Quiere Borrar este Registro?')">
                                                                <i class="fas fa-trash-alt"></i></button>
                                                            @endcan
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{$productos->links()}}

            </div>
        </div>
        <!-- /.tab-content -->
    </div><!-- /.card-body -->
</div>
<!-- /.card-header -->
</div>
@endsection
