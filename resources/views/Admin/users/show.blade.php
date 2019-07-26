@extends('home')

@section('blade')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Detalle de Usuario</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('users.index')}}">Lista Usuario</a></li>
                    <li class="breadcrumb-item active">Detalle Usuario</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>


@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
    <strong>Whoops!</strong> Error en la actualizacion de datos.<br><br>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{route('manage_permissions',$user->id)}}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="card">
        <section class="content">
            <div class="container-fluid mt-3">
                <div class="form-group">
                    <strong>Name:</strong>
                    {{ $user->name }}
                </div>
                <div class="form-group">
                    <strong>Username:</strong>
                    {{ $user->username }}
                </div>
                <div class="form-group">
                    <strong>Name:</strong>
                    {{ $user->email }}
                </div>
                <div class="form-group">
                    <strong>Rol:</strong>
                    @foreach($roles as $rol=>$value)
                    @if($user->hasRole($value))
                    {{$value}}
                    @endif
                    @endforeach
                </div>
            </div>
        </section>
    </div>

    @include('layouts.permisos')

    <div class="form-group">
        <input type="submit" class="btn btn-info" value="Update">
    </div>
</form>
@endsection