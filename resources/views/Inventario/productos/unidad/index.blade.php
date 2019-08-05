@extends('home')
@section('blade')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                @can('create.productos')
                <a class="btn btn-success" href="{{route('productos.create_produnid')}}">
                    Crear Unidad/Producto
                    <i class="fa fa-th-large"></i>
                </a>
                @endcan
                </a>
            </div><!-- /.col -->

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Lista de Unidad/Producto</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>


<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-3">
                <h3 class="card-title">Unidad/Producto</h3>
            </div>
            <div class="col-md-7">
                @include('partials.success-alert')
                <!--mensaje de exito proceso-->
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
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
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
                @foreach($p_unid->productos as $p_u)
                <tr>
                    <td>{{$p_u->nombre_producto}}</td>
                    <td>{{$p_unid->nombre_unidad}}</td>
                    <td>{{$p_u->pivot->cantidad}}</td>
                    <td>{{$p_u->pivot->precio_venta}}</td>
                    <td>{{$p_u->pivot->costo}}</td>
                    <td>
                        <form action="{{route('productos.destroy_produnid',$p_unid->id)}}" method="POST">
                            @can('update.productos')
                            <a class="btn btn-outline-secondary btn-sm"
                                href="{{route('productos.edit_produnid',$p_unid->id)}}">
                                <i class="fa fa-edit"></i>
                            </a>
                            @endcan

                            @csrf
                            @method('DELETE')
                            @can('delete.productos')
                            <button type="submit" class="btn btn-outline-danger btn-sm"
                                onclick="return confirm('Quiere Borrar este Registro?')">
                                <i class="fas fa-trash-alt"></i></button>
                            @endcan
                        </form>
                    </td>
                </tr>
                @endforeach
                @endforeach
            </tbody>
        </table>
        {{$prod_unidad->links()}}
    </div>
</div>
@endsection
