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
                    <li class="breadcrumb-item"><a href="{{route('users.index')}}">Lista Usuario</a></li>
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
            <form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <div class="row">
                        <label for="" class="col-md-3">Nombre</label>
                        <div class="col-md-6"><input type="text" name="name"
                            class="form-control @error('name') is-invalid @enderror"
                            @error('name')
                            placeholder="{{ $message }}"
                            @enderror></div>

                        <div class="clearfix"></div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label for="" class="col-md-3">Usuario</label>
                        <div class="col-md-6"><input type="text" name="username"
                            class="form-control @error('username') is-invalid @enderror"
                            @error('username')
                            placeholder="{{ $message }}"
                            @enderror></div>
                        <div class="clearfix"></div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label for="" class="col-md-3">Correo</label>
                        <div class="col-md-6"><input type="text" name="email"
                            class="form-control @error('email') is-invalid @enderror"
                            @error('email')
                            placeholder="{{ $message }}"
                            @enderror></div>
                        <div class="clearfix"></div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label for="" class="col-md-3">Password</label>
                        <div class="col-md-6"><input type="password" name="password"
                            class="form-control @error('password') is-invalid @enderror"
                            @error('password')
                            placeholder="{{ $message }}"
                            @enderror></div>
                        <div class="clearfix"></div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label for="" class="col-md-3">Rol</label>
                        <div class="col-md-6">
                            <select name="rol" id=""
                            class="form-control @error('rol') is-invalid @enderror">
                                <option value="">Seleccionar Rol</option>
                                @foreach($roles as $rol=>$value)
                                <option value="{{$rol}}">{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>


                <div class="form-group">
                    <input type="submit" class="btn btn-info" value="Save">
                </div>
            </form>
        </div>
    </section>
</div>
@endsection
