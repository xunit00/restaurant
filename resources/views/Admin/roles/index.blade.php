@extends('home')
@section('blade')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                @can('create.role')
                <a class="btn btn-success" href="{{route('admin.roles.create')}}">
                    Crear Rol
                    <i class="fa fa-user-plus"></i>
                </a>
                @endcan
            </div><!-- /.col -->

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Lista de Roles</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Roles</h3>

            @include('partials.success-alert')
            <!--mensaje de exito proceso-->

            <div class="card-tools">
                <form action="{{route('search.roles')}}">
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
                        <th>ID</th>
                        <th>Name</th>
                        <th>Modyfy</th>
                    </tr>
                    @foreach($roles as $rol)
                    <tr>
                        <td>{{$rol->id}}</td>
                        <td>{{$rol->name}}</td>
                        <td>
                            <form action="{{route('admin.roles.destroy',$rol->id)}}" method="POST">
                                @can('update.role')
                                <a class="btn btn-outline-secondary btn-sm" href="{{route('admin.roles.edit',$rol->id)}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                @endcan

                                @csrf
                                @method('DELETE')
                                @can('delete.role')
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
            {{$roles->links()}}
        </div>
    </div>
</div>
@endsection
