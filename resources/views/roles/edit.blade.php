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

@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
    <strong>Whoops!</strong> Error en la actualizacion de datos.<br><br>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<!-- /.content-header -->
<div class="card" id="app">
    <section class="content">
        <div class="container-fluid mt-3">
            <form action="" method="POST" enctype="multipart/form-data">

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


                    <div class="container">
                            <div class="form-group mt-2">
                                <div class="row">
                                    <label class="col-md-2">Permisos</label>
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox">
                                                    <label class="form-check-label">Seleccionar Todo</label>
                                                </div>
                                            </div>
                                        </div>

                    <div class="card">
                        <section class="content">
                            <div class="container-fluid">

                                @foreach($permissions as $permission=>$all)
                                    <div class="form-check">
                                    <input class="form-check-input" type="checkbox"
                                        name="permission[]" value="{{$all}}"
                                        @foreach($my_perm as $mp=>$value)
                                        @if($all==$value) checked @endif
                                        @endforeach>
                                        <label class="form-check-label">{{$all}}</label>
                                    </div>
                                 @endforeach

                            </div>
                        </section>
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
