@extends('home')

@section('blade')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Actualizar Rol</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('roles.index')}}">Lista Roles</a></li>
                    <li class="breadcrumb-item active">Actualizar Rol</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

@include('partials.errors-update')

<!-- /.content-header -->
<div class="card" id="app">
    <section class="content">
        <div class="container-fluid mt-3">
            <form action="{{route('roles.update',$role->id)}}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <div class="row">
                        <label for="" class="col-md-2">Nombre</label>
                        <div class="col-md-6">
                            <input type="text" name="name" class="form-control" value="{{$role->name}}">
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>

                @include('layouts.permisos')

                <div class="form-group">
                    <input type="submit" class="btn btn-info" value="Update">
                </div>
            </form>
        </div>
    </section>
</div>
@endsection
