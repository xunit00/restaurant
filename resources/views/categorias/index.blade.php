@extends('home')
@section('blade')
<!-- Content Header (Page header) -->
<div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    @can('create.categorias')
                    <a class="btn btn-success" href="{{route('categorias.create')}}">
                        Crear Categorias
                        <i class="fa fa-th-large"></i>
                    @endcan
                    </a>
                </div><!-- /.col -->

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Lista de Categorias</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Categorias</h3>

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
                        <th>Status</th>
                        <th>Modyfy</th>
                    </tr>
                    @foreach($categorias as $cat)
                    <tr>
                        <td>{{$cat->nombre}}</td>
                        <td>{{$cat->descripcion}}</td>
                        <td>
                            @if($cat->status==1) <span class="badge bg-success">ACTIVO</span>
                            @else <span class="badge bg-danger">INACTIVO</span>
                            @endif
                        </td>

                        <td>
                            <form action="{{route('categorias.destroy',$cat->id)}}" method="POST">
                                @can('update.categorias')
                                <a class="btn btn-outline-secondary btn-sm"
                                    href="{{route('categorias.edit',$cat->id)}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                @endcan

                                @csrf
                                @method('DELETE')
                                @can('delete.categorias')
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
            {{$categorias->links()}}
        </div>
        <!-- /.card-body -->
    </div>
</div>
@endsection
