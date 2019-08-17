@extends('home')

@section('blade')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Producto</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('productos.index')}}">Lista Producto</a></li>
                    <li class="breadcrumb-item active">Ver Producto</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<!-- /.content-header -->
<div class="card">
    <section class="content">
        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <strong>Nombre Producto:</strong>
                        {{ $producto->nombre }}
                    </div>
                    <div class="form-group">
                        <strong>Unidad:</strong>
                        {{$producto->unidad->nombre}}
                    </div>
                    <div class="form-group">
                        <strong>Descripcion:</strong>
                        {{ $producto->descripcion }}
                    </div>
                    <div class="form-group">
                        <strong>Categoria:</strong>
                        {{$producto->categoria->nombre}}
                    </div>
                    <div class="form-group">
                        <strong>Costo:</strong>
                        {{$producto->costo}}
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <strong>Stock Producto:</strong>
                        {{ $producto->existencia }}
                    </div>
                    <div class="form-group">
                        <strong>Stock Maximo:</strong>
                        {{$producto->maximo}}
                    </div>
                    <div class="form-group">
                        <strong>Stock Reorden:</strong>
                        {{ $producto->reorden }}
                    </div>
                    <div class="form-group">
                        <strong>Stock Minimo:</strong>
                        {{$producto->minimo}}
                    </div>
                    <div class="form-group">
                        <strong>Precio Venta:</strong>
                        {{$producto->precio_venta}}
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        @if($producto->imagen==null)
                        <h3>Sin Imagen</h3>
                        @else
                        <img src="{{ asset('storage/'.$producto->imagen)}}" width="150" height="150">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
