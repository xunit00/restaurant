@extends('home')
@section('blade')
<!-- Content Header (Page header) -->
<div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    @can('create.unidades')
                    <a class="btn btn-success" href="{{route('unidades.create')}}">
                        Crear Unidades
                        <i class="fa fa-boxes"></i>
                    </a>
                    @endcan
                </div><!-- /.col -->

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Lista de Unidades</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Unidades</h3>

            @include('partials.success-alert')<!--mensaje de exito proceso-->

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
                        <th>Contenido</th>
                        <th>Status</th>
                        <th>Modyfy</th>
                    </tr>
                    @foreach($unidades as $unidade)
                    <tr>
                        <td>{{$unidade->nombre_unidad}}</td>
                        <td>{{$unidade->descripcion_unidad}}</td>
                        <td>{{$unidade->contenido}}</td>
                        <td>
                            @if($unidade->status==1) <span class="badge bg-success">ACTIVO</span>
                            @else <span class="badge bg-danger">INACTIVO</span>
                            @endif
                        </td>

                        <td>
                            <form action="{{route('unidades.destroy',$unidade->id)}}" method="POST">
                                @can('update.unidades')
                                <a class="btn btn-outline-secondary btn-sm"
                                    href="{{route('unidades.edit',$unidade->id)}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                @endcan

                                @csrf
                                @method('DELETE')
                                @can('delete.unidades')
                                <button type="submit" class="btn btn-outline-danger btn-sm"
                                    onclick="return confirm('Quiere Borrar este Registro?')">
                                    <i class="fas fa-trash-alt"></i></button>
                                @endcan
                            {{-- </form> --}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$unidades->links()}}
        </div>
        <!-- /.card-body -->
    </div>
</div>
@endsection
