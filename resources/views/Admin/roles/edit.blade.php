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
                    <li class="breadcrumb-item"><a href="{{route('admin.roles.index')}}">Lista Roles</a></li>
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
            <form action="{{route('admin.roles.update',$role->id)}}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                @include('admin.roles.form')

                @include('layouts.permisos')

                <div class="form-group">
                    <input type="submit" class="btn btn-info" value="Update">
                </div>
            </form>
        </div>
    </section>
</div>
@endsection
