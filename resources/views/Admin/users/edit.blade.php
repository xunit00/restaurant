@extends('home')

@section('blade')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Actualizar Usuario</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.users.index')}}">Lista Usuario</a></li>
                    <li class="breadcrumb-item active">Actualizar Usuario</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

@include('partials.errors-update')

<!-- /.content-header -->
<div class="card">
    <section class="content">
        <div class="container-fluid mt-3">
            <form action="{{route('admin.users.update',$user->id)}}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                    @csrf

                        @include('admin.users.form')

                <div class="form-group">
                    <input type="submit" class="btn btn-info" value="Update">
                </div>
            </form>
        </div>
    </section>
</div>
@endsection
