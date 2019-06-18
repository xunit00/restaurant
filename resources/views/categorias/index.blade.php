@extends('home')
@section('blade')
<div class="container mt-2">
    <a class="btn btn-success" href="{{route('categorias.create')}}">
        Agregar Nueva Categoria
        <i class="fa fa-user-plus"></i>
    </a>
    <div class="card mt-2">
        <div class="card-header">
            <h3 class="card-title">Roles</h3>

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
                                @can('update.role')
                                <a class="btn btn-outline-secondary btn-sm"
                                    href="{{route('categorias.edit',$cat->id)}}">
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
            {{$categorias->links()}}
        </div>
        <!-- /.card-body -->
    </div>
</div>
@endsection
