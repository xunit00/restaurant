@extends('home')

@section('blade')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Actualizar Categoria</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('categorias.index')}}">Lista Categoria</a></li>
                    <li class="breadcrumb-item active">Actualizar Categoria</li>
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
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<!-- /.content-header -->
<div class="card">
    <section class="content">
        <div class="container-fluid mt-3">
            <form action="{{route('categorias.update',$categoria->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <div class="row">
                        <label for="" class="col-md-3">Nombre</label>
                        <div class="col-md-6"><input type="text" name="nombre" value="{{$categoria->nombre}}"
                                class="form-control @error('nombre') is-invalid @enderror"></div>

                        <div class="clearfix"></div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label for="" class="col-md-3">Descripcion</label>
                        <div class="col-md-6"><input type="text" name="descripcion" value="{{$categoria->descripcion}}"
                                class="form-control @error('descripcion') is-invalid @enderror"></div>
                        <div class="clearfix"></div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label for="" class="col-md-3">Status</label>
                        <div class="col-md-6">
                            <select name="status" id="" class="form-control @error('status') is-invalid @enderror">
                                {{-- <option value="">Seleccionar Rol</option> --}}
                                @if($categoria->status==1)
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
