@extends('home')

@section('blade')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Detalle de Usuario</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('clientes.index')}}">Lista Clientes</a></li>
                    <li class="breadcrumb-item active">Detalle Cliente</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
    <div class="card">
        <section class="content">
            <div class="container-fluid mt-3">
                <div class="form-group">
                    <strong>Nombre:</strong>
                    {{ $cliente->name }}
                </div>
                <div class="form-group">
                        <strong>Dni:</strong>
                        {{ $cliente->dni }}
                    </div>
                <div class="form-group">
                        <strong>Telefono:</strong>
                        {{ $cliente->telefono }}
                    </div>
                <div class="form-group">
                        <strong>Direccion:</strong>
                        {{ $cliente->direccion }}
                </div>
                <div class="form-group">
                    <strong>Username:</strong>
                    {{ $cliente->username }}
                </div>
                <div class="form-group">
                    <strong>Crorreo:</strong>
                    {{ $cliente->email }}
                </div>
            </div>
        </section>
    </div>
@endsection
