@extends('home')

@section('blade')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Agregar Usuario</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.users.index')}}">Lista Usuario</a></li>
                    <li class="breadcrumb-item active">Agregar Usuario</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

@include('partials.errors-create')

<!-- /.content-header -->
<div class="card">
    <section class="content">
        <div class="container-fluid mt-3">
            <form action="{{route('admin.users.store')}}" method="POST" enctype="multipart/form-data">
                @csrf

                @include('admin.users.form')

                <div class="form-group">
                    <input type="submit" class="btn btn-info" value="Save">
                </div>
            </form>
        </div>
    </section>
</div>
@endsection
