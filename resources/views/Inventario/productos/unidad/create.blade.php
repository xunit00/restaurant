@extends('home')

@section('blade')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Agregar Unidad Producto</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('productos.indexUnidad')}}">Lista Productos</a></li>
                    <li class="breadcrumb-item active">Agregar Unidad Productos</li>
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
            <form action="{{route('productos.store_produnid')}}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- @include('inventario.productos.unidad.form') --}}
                <div class="form-group">
                        <div class="row">
                            <label for="" class="col-md-3">Producto</label>
                            <div class="col-md-6">
                                <select name="producto_id" id=""
                                class="form-control @error('producto_id') is-invalid @enderror">
                                    <option value="">Seleccionar Producto</option>
                                    @foreach($productos as $prod=>$value)
                                    <option value="{{$prod}}">{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                <div class="form-group">
                        <div class="row">
                            <label for="" class="col-md-3">Unidad</label>
                            <div class="col-md-6">
                                <select name="unidad_id" id=""
                                class="form-control @error('unidad_id') is-invalid @enderror">
                                    <option value="">Seleccionar Unidad</option>
                                    @foreach($unidades as $unidad=>$value)
                                    <option value="{{$unidad}}">{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div class="form-group">
                            <div class="row">
                                <label for="" class="col-md-3">Cantidad</label>
                                <div class="col-md-6"><input type="text" name="cantidad"
                                        class="form-control @error('cantidad') is-invalid @enderror" @error('cantidad')
                                        placeholder="{{ $message }}" @enderror></div>

                                <div class="clearfix"></div>
                            </div>
                        </div>

                <div class="form-group">
                    <div class="row">
                        <label for="" class="col-md-3">Precio de Venta</label>
                        <div class="col-md-6"><input type="text" name="precio_venta"
                                class="form-control @error('precio_venta') is-invalid @enderror" @error('precio_venta')
                                placeholder="{{ $message }}" @enderror></div>

                        <div class="clearfix"></div>
                    </div>
                </div>



                <div class="form-group">
                    <div class="row">
                        <label for="" class="col-md-3">Costo</label>
                        <div class="col-md-6"><input type="text" name="costo"
                                class="form-control @error('costo') is-invalid @enderror" @error('costo')
                                placeholder="{{ $message }}" @enderror></div>
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
