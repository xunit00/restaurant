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

@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
    <strong>Whoops!</strong> Error en la insercion de datos.<br><br>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<!-- /.content-header -->
<div class="card">
    <section class="content">
        <div class="container-fluid mt-3">
            <form action="{{route('unidades.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <div class="row">
                        <label for="" class="col-md-3">Nombre</label>
                        <div class="col-md-6"><input type="text" name="nombre"
                                class="form-control @error('nombre') is-invalid @enderror" @error('nombre')
                                placeholder="{{ $message }}" @enderror></div>

                        <div class="clearfix"></div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label for="" class="col-md-3">Descripcion</label>
                        <div class="col-md-6"><input type="text" name="descripcion"
                                class="form-control @error('descripcion') is-invalid @enderror" @error('descripcion')
                                placeholder="{{ $message }}" @enderror></div>
                        <div class="clearfix"></div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label for="" class="col-md-3">Categoria</label>
                        <div class="col-md-6">
                            <select name="rol" id=""
                            class="form-control @error('categoria') is-invalid @enderror">
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
                    <div class="row">
                        <label for="" class="col-md-3">Unidad</label>
                        <div class="col-md-6">
                            <select name="rol" id=""
                            class="form-control @error('unidades') is-invalid @enderror">
                                <option value="">Seleccionar Unidad</option>
                                @foreach($unidades as $unid=>$value)
                                <option value="{{$unid}}">{{$value}}</option>
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
