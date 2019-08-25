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

            @include('partials.success-alert')
            <!--mensaje de exito proceso-->


            <div class="card-tools">
                <form action="{{route('search.categorias')}}">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="value" class="form-control float-right" placeholder="Search">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
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
                    @foreach($productos as $prod)
                    <tr>
                        <td>{{$prod->nombre}}</td>
                        <td>{{$prod->descripcion}}</td>
                        <td>
                            <form action="{{route('status.catProducto',$prod->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                @if($cat->status==1)
                                <button type="submit" class="btn btn-outline-success btn-sm"
                                    onclick="return confirm('Quiere Actualizar este Registro?')">ACTIVO</button>
                                @else
                                <button type="submit" class="btn btn-outline-danger btn-sm"
                                    onclick="return confirm('Quiere Actualizar este Registro?')">INACTIVO</button>
                                @endif
                            </form>
                        </td>
                        <td>
                            <form action="{{route('categorias.destroy',$prod->id)}}" method="POST">
                                @can('update.categorias')
                                <a class="btn btn-outline-secondary btn-sm"
                                    href="{{route('categorias.edit',$prod->id)}}">
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
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            {{$productos->links()}}
        </div>
    </div>
</div>
@endsection
