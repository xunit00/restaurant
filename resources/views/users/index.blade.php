@extends('home')
@section('blade')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                @can('create.users')
                <a class="btn btn-success" href="{{route('users.create')}}">
                    Crear Usuario
                    <i class="fa fa-user-plus"></i>
                </a>
                @endcan
            </div><!-- /.col -->

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Lista de Usuario</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Usuarios</h3>

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
                        <th>Name</th>
                        <th>Rol</th>
                        <th>Modyfy</th>
                    </tr>
                    @foreach($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->roles->implode('name',', ')}}</td>
                        <td>
                            <form action="{{route('users.destroy',$user->id)}}" method="POST">
                                @can('update.users')
                                <a class="btn btn-outline-secondary btn-sm" href="{{route('users.edit',$user->id)}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                @endcan

                                @can('update.permissions')
                                <a class="btn btn-outline-primary btn-sm" href="{{ route('users.show',$user->id) }}">
                                    <i class="fas fa-info-circle"></i>
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
            {{$users->links()}}
        </div>
        <!-- /.card-body -->
    </div>
</div>
@endsection
