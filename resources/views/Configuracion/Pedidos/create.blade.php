@extends('home')

@section('blade')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Crear Orden</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="{{route('mesas.index')}}">Lista Mesas</a></li>
                    <li class="breadcrumb-item active">Agregar Orden</li>
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
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf



                <div class="form-group">
                    <div class="row">
                        <label for="" class="col-md-3">Posee Afeccion</label>
                        <div class="col-md-6">
                            <select name="unidad_id" id="" class="form-control @error('unidad_id') is-invalid @enderror">
                                <option value="">Seleccionar Afeccion</option>
                                <option value="" selected>No</option>
                                <option value="">Diabetico</option>
                            </select>
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-md-3">
                            <input type="submit" class="btn btn-info" value="Generar">
                          </div>

                    </div>



                </div>




                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>Plato</th>
                                <th>Descripcion</th>
                                <th>Calorias</th>
                                <th>Funcion</th>
                            </tr>
                            <tr>
                                <td>Arroz con guandules</td>
                                <td>Doe</td>
                                <td>100</td>
                                <td>
                                    <button type="submit" class="btn btn-outline-success btn-sm"
                                    onclick="return confirm('Quiere Actualizar este Registro?')">Agregar</button>
                                    <button type="submit" class="btn btn-outline-danger btn-sm"
                                onclick="return confirm('Quiere Actualizar este Registro?')">Modificar</button>
                                </td>
                              </tr>
                              <tr>
                                <td>Pechuga a la Plancha</td>
                                <td>una pieza</td>
                                <td>200</td>
                                <td>
                                    <button type="submit" class="btn btn-outline-success btn-sm"
                                    onclick="return confirm('Quiere Actualizar este Registro?')">Agregar</button>
                                    <button type="submit" class="btn btn-outline-danger btn-sm"
                                onclick="return confirm('Quiere Actualizar este Registro?')">Modificar</button>
                                </td>
                              </tr>
                              <tr>
                                <td>Bistec de Cerdo</td>
                                <td>2 piezas</td>
                                <td>500</td>
                                <td>
                                    <button type="submit" class="btn btn-outline-success btn-sm"
                                    onclick="return confirm('Quiere Actualizar este Registro?')">Agregar</button>
                                    <button type="submit" class="btn btn-outline-danger btn-sm"
                                onclick="return confirm('Quiere Actualizar este Registro?')">Modificar</button>
                                </td>
                              </tr>

                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </form>
        </div>
    </section>
</div>
@endsection
