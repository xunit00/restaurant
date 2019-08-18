@extends('home')
@section('blade')
<!-- Content Header (Page header) -->
<div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    @can('create.productos')
                    <a class="btn btn-success" href="{{route('clientes.create')}}">
                        Crear Cliente
                        <i class="fa fa-th-large"></i>
                    @endcan
                    </a>
                </div><!-- /.col -->

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Lista de Clientes</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Cliente</h3>

            @include('partials.success-alert')<!--mensaje de exito proceso-->

            <div class="card-tools">
                <form action="{{route('search.clientes')}}">
                <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="value" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <table class="table table-hover">
                <tbody>
                    <tr>
                        <th>Nombre</th>
                        <th>Dni</th>
                        <th>Telefono</th>
                        <th>Direccion</th>
                        <th>Modify</th>
                    </tr>
                    @foreach($clientes as $cliente)
                    <tr>
                        <td>{{$cliente->name}}</td>
                        <td>{{$cliente->dni}}</td>
                        <td>{{$cliente->telefono}}</td>
                        <td>{{$cliente->direccion}}</td>
                        <td>
                            <form action="{{route('clientes.destroy',$cliente->id)}}" method="POST">
                                @can('update.productos')
                                <a class="btn btn-outline-primary btn-sm"
                                    href="{{route('clientes.edit',$cliente->id)}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                @endcan

                                <a class="btn btn-outline-secondary btn-sm"
                                href="{{route('clientes.show',$cliente->id)}}">
                                <i class="fas fa-info-circle"></i>
                                </a>

                                @csrf
                                @method('DELETE')
                                @can('delete.productos')
                                <button type="submit" class="btn btn-outline-danger btn-sm"
                                    onclick="return confirm('Quiere Borrar este Registro?')">
                                    <i class="fas fa-trash-alt"></i></button>
                                @endcan
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$clientes->links()}}
        </div>
        <!-- /.card-body -->
    </div>
</div>
@endsection
