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
                    <li class="breadcrumb-item"><a href="{{route('users.index')}}">Lista Usuario</a></li>
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
            <form action="{{route('users.update',$user->id)}}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                {{-- <div class="form-group">
                    <div class="row">
                        <label for="" class="col-md-3">Nombre</label>
                        <div class="col-md-6"><input type="text" name="name" value="{{$user->name}}"
                                class="form-control @error('name') is-invalid @enderror"></div>
                        <div class="clearfix"></div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label for="" class="col-md-3">Usuario</label>
                        <div class="col-md-6"><input type="text" name="username" value="{{$user->username}}"
                                class="form-control @error('username') is-invalid @enderror"></div>
                        <div class="clearfix"></div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label for="" class="col-md-3">Correo</label>
                        <div class="col-md-6"><input type="text" name="email" value="{{$user->email}}"
                                class="form-control @error('email') is-invalid @enderror"></div>
                        <div class="clearfix"></div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label for="" class="col-md-3">Password</label>
                        <div class="col-md-6"><input type="password" name="password" value="{{$user->password}}"
                                class="form-control @error('password') is-invalid @enderror"></div>
                        <div class="clearfix"></div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label for="" class="col-md-3">Rol</label>
                        <div class="col-md-6">
                            <select name="rol" id="" class="form-control @error('rol') is-invalid @enderror">
                                @foreach($roles as $rol=>$value)

                                @if($user->hasRole($value))
                                <option value="{{$rol}}" selected>{{$value}}</option>
                                @else
                                <option value="{{$rol}}">{{$value}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div> --}}


                <div class="form-group">
                    <input type="submit" class="btn btn-info" value="Update">
                </div>
            </form>
        </div>
    </section>
</div>
@endsection
