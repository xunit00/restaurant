@extends('home')
@section('blade')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                @can('create.permissions')
                <a class="btn btn-success" href="{{route('permissions.create')}}">
                    Crear Permiso
                    <i class="fa fa-user-plus"></i>
                </a>
                @endcan
            </div><!-- /.col -->

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Lista de Permisos</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Permisos</h3>

            @include('partials.success-alert')
            <!--mensaje de exito proceso-->

            <div class="card-tools">
                <form action="{{route('search.permissions')}}">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="value" class="form-control float-right" placeholder="Search">

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
                        <th>ID</th>
                        <th>Name</th>
                        <th>Modyfy</th>
                    </tr>
                    @foreach($permissions as $permission)
                    <tr>
                        <td>{{$permission->id}}</td>
                        <td>{{$permission->name}}</td>
                        <td>
                            @can('update.permissions')
                            <a class="btn btn-outline-secondary btn-sm"
                                href="{{route('permissions.edit',$permission->id)}}">
                                <i class="fa fa-edit"></i>
                            </a>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            {{$permissions->links()}}
        </div>
    </div>
</div>
@endsection
