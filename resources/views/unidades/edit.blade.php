@extends('home')

@section('blade')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Actualizar Unidad</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('unidades.index')}}">Lista Unidad</a></li>
                    <li class="breadcrumb-item active">Actualizar Unidad</li>
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
            <form action="{{route('unidades.update',$unidad->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <div class="row">
                        <label for="" class="col-md-3">Nombre</label>
                        <div class="col-md-6"><input type="text" name="nombre_unidad" value="{{$unidad->nombre_unidad}}"
                                class="form-control @error('nombre_unidad') is-invalid @enderror"></div>

                        <div class="clearfix"></div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label for="" class="col-md-3">Descripcion</label>
                        <div class="col-md-6"><input type="text" name="descripcion_unidad" value="{{$unidad->descripcion_unidad}}"
                                class="form-control @error('descripcion_unidad') is-invalid @enderror"></div>
                        <div class="clearfix"></div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label for="" class="col-md-3">Contenido</label>
                        <div class="col-md-6"><input type="text" name="contenido" value="{{$unidad->contenido}}"
                                class="form-control @error('contenido') is-invalid @enderror"></div>
                        <div class="clearfix"></div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label for="" class="col-md-3">Status</label>
                        <div class="col-md-6">
                            <select name="status" id="" class="form-control @error('status') is-invalid @enderror">
                                @if($unidad->status==1)
                                <option value="0">Inactivo</option>
                                <option value="1" selected>Activo</option>
                                @else
                                <option value="0" selected>Inactivo</option>
                                <option value="1">Activo</option>
                                @endif
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
