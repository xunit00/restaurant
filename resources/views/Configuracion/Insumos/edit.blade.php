@extends('home')

@section('blade')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Actualizar Insumos</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('insumos.index')}}">Lista Insumos</a></li>
                    <li class="breadcrumb-item active">Actualizar Insumo</li>
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
            <form action="{{route('insumos.update',$insumo->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                @include('configuracion.insumos.form')

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            @if($insumo->imagen==null)
                            <h3>Sin Imagen</h3>
                            @else
                            <img src="{{ asset('storage/imagenes/insumo/'.$insumo->imagen)}}" width="100" height="100">
                            @endif
                            <div class="clearfix"></div>
                        </div>
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
