@extends('home')

@section('blade')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Agregar Entrada/Salida</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="{{route('recetas.index')}}">Lista Entrada/Salida</a></li>
                    <li class="breadcrumb-item active">Agregar Entrada/Salida</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<create-transaccion :usuario="{{auth()->user()->id}}" :insumos="{{$insumos}}"></create-transaccion>

@endsection
