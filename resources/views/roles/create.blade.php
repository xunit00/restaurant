@extends('home')

@section('blade')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Agregar Rol</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('roles.index')}}">Lista Roles</a></li>
                    <li class="breadcrumb-item active">Agregar Rol</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
    <strong>Whoops!</strong> Error en la insercion de datos.<br><br>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<!-- /.content-header -->
<div class="card" id="app">
    <section class="content">
        <div class="container-fluid mt-3">
            <form action="{{route('permissions.store')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <permissions-component></permissions-component>

                <div class="form-group">
                    <input type="submit" class="btn btn-info" value="Save">
                </div>
            </form>
        </div>
    </section>
</div>
@endsection
