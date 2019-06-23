@extends('home')
@section('blade')
<!-- Content Header (Page header) -->
<div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <a class="btn btn-success" href="{{route('productos.create')}}">
                        Crear Producto
                        <i class="fa fa-th-large"></i>
                    </a>
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

<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Producto</h3>

            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                <p>{{ session('success') }}</p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <table class="table table-hover">
                <tbody>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Categoria</th>
                        <th>Unidad</th>
                        <th>Modyfy</th>
                    </tr>
                    @foreach($productos as $prod)
                    <tr>
                        <td>{{$prod->nombre_producto}}</td>
                        <td>{{$prod->descripcion_producto}}</td>
                        <td>{{$prod->categoria->nombre}}</td>
                        <td>{{$prod->productos_unidades}}</td>
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
</div>
@endsection
