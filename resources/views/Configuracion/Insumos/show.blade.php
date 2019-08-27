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
                    <li class="breadcrumb-item"><a href="{{route('insumos.index')}}">Lista Insumos</a></li>
                    <li class="breadcrumb-item active">Ver Insumo</li>
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
                        <strong>Nombre Insumo:</strong>
                        {{ $insumo->nombre }}
                    </div>
                    <div class="form-group">
                        <strong>Unidad:</strong>
                        {{$insumo->unidad->nombre}}
                    </div>
                    <div class="form-group">
                        <strong>Descripcion:</strong>
                        {{ $insumo->descripcion }}
                    </div>
                    <div class="form-group">
                        <strong>Categoria:</strong>
                        {{$insumo->categoria->nombre}}
                    </div>
                    <div class="form-group">
                        <strong>Costo:</strong>
                        {{$insumo->costo}}
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <strong>Stock Insumo:</strong>
                        {{ $insumo->existencia }}
                    </div>
                    <div class="form-group">
                        <strong>Stock Maximo:</strong>
                        {{$insumo->maximo}}
                    </div>
                    <div class="form-group">
                        <strong>Stock Reorden:</strong>
                        {{ $insumo->reorden }}
                    </div>
                    <div class="form-group">
                        <strong>Stock Minimo:</strong>
                        {{$insumo->minimo}}
                    </div>
                    <div class="form-group">
                        <strong>Precio Venta:</strong>
                        {{$insumo->precio_venta}}
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        @if($insumo->imagen==null)
                        <h3>Sin Imagen</h3>
                        @else
                        <img src="{{ asset('storage/imagenes/insumo/'.$insumo->imagen)}}" width="150" height="150">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
