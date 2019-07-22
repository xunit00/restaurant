@extends('home')

@section('blade')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Agregar Producto</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('productos.index')}}">Lista Productos</a></li>
                    <li class="breadcrumb-item active">Agregar Productos</li>
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
            <form action="{{route('productos.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <div class="row">
                        <label for="" class="col-md-3">Nombre</label>
                        <div class="col-md-6"><input type="text" name="nombre_producto"
                                class="form-control @error('nombre_producto') is-invalid @enderror" @error('nombre_producto')
                                placeholder="{{ $message }}" @enderror></div>

                        <div class="clearfix"></div>
                    </div>
                </div>



                <div class="form-group">
                    <div class="row">
                        <label for="" class="col-md-3">Descripcion</label>
                        <div class="col-md-6"><input type="text" name="descripcion_producto"
                                class="form-control @error('descripcion_producto') is-invalid @enderror" @error('descripcion_producto')
                                placeholder="{{ $message }}" @enderror></div>
                        <div class="clearfix"></div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label for="" class="col-md-3">Categoria</label>
                        <div class="col-md-6">
                            <select name="id_categoria" id=""
                            class="form-control @error('id_categoria') is-invalid @enderror">
                                <option value="">Seleccionar Categoria</option>
                                @foreach($categorias as $cat=>$value)
                                <option value="{{$cat}}">{{$value}}</option>
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
