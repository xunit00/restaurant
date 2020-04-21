
<template>
<!-- /.content-header -->
<div class="card">
    <section class="content">
        <div class="container-fluid mt-3">
            <form action="" method="POST" enctype="multipart/form-data">



                <div class="form-group">
                    <div class="row">
                        <label for="" class="col-md-3">Posee Enfermedad</label>
                        <div class="col-md-6">
                            <select name="unidad_id" id="" class="form-control">
                                <option value="" selected>Seleccionar Enfermedad</option>
                                <option value="NO">No</option>
                                <option value="PreDiabetico">Pre-Diabetico</option>
                                <option value="Diabetico">Diabetico</option>
                            </select>
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-md-3">
                            <input type="submit" class="btn btn-info" value="Generar">
                          </div>

                    </div>



                </div>


                 <div class="form-group">
                    <div class="row">
                        <label for="" class="col-md-3">Informacion Extra</label>
                        <div class="col-md-3">
                            <select name="unidad_id" id="" class="form-control">
                                <option value="" selected>Seleccionar Genero</option>
                                <option value="m">Masculino</option>
                                <option value="f">Femenino</option>
                            </select>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-3">
                        <input
                        type="number"
                        name="porciones"

                        placeholder="Edad"

                        class="form-control"
                        />
                        </div>
                    </div>

 <div class="form-group"></div>

                          <div class="row">
                               <div class="col-md-3"></div>
                              <div class="col-md-3">
                            <select name="unidad_id" id="" class="form-control">
                                <option value="" selected>Factor de Actividad</option>
                                <option value="1">Sedentario</option>
                                <option value="1.2">Muy baja</option>
                                <option value="1.4">Baja</option>
                                <option value="1.6">Moderado</option>
                                <option value="1.8">Activo</option>
                                <option value="2">Muy Activo</option>
                            </select>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-3">
                        <input
                        type="number"
                        name="altura"

                        placeholder="Altura"

                        class="form-control"
                        />
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

</template>
<script>
export default {
    data() {
        return {
            form: new Form({
                enfermedad: "",
                genero: "",
                edad: "",
                actividad: "",
                altura: "",
            })
        };
    }
}
</script>
