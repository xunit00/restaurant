
<template>
  <!-- /.content-header -->
  <div class="card">
    <section class="content">
      <div class="container-fluid mt-3">
        <form @submit.prevent="create()">
          <div class="form-group">
            <div class="row">
              <label for class="col-md-3">Posee Enfermedad</label>
              <div class="col-md-6">
                <select v-model="enfermedad" class="form-control">
                  <option value selected>Seleccionar Enfermedad</option>
                  <option value="NO">No</option>
                  <option value="Diabetico">Diabetico</option>
                </select>
              </div>
              <div class="clearfix"></div>

              <div class="col-md-3">
                <a class="btn btn-info" @click="calculate">
                  <i class="fas fa-plus-circle"></i>
                </a>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="row">
              <label for class="col-md-3">Informacion Extra</label>
              <div class="col-md-3">
                <select v-model="genero" class="form-control">
                  <option value selected>Seleccionar Genero</option>
                  <option value="m">Masculino</option>
                  <option value="f">Femenino</option>
                </select>
              </div>
              <div class="clearfix"></div>
              <div class="col-md-3">
                <input type="number" v-model="edad" placeholder="Edad" class="form-control" />
              </div>

              <div class="col-md-3">
                <input type="number" v-model="peso" placeholder="Peso(lb)" class="form-control" />
              </div>
            </div>

            <div class="form-group"></div>

            <div class="row">
              <div class="col-md-3"></div>
              <div class="col-md-3">
                <select v-model="actividad" class="form-control">
                  <option value selected>Factor de Actividad</option>
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
                  v-model="altura"
                  placeholder="Altura(pies)"
                  class="form-control"
                />
              </div>

              <div class="col-md-3">
                <input
                  type="number"
                  v-model="calorias"
                  placeholder="Calorias"
                  class="form-control"
                  disabled
                />
              </div>
            </div>
          </div>

        <div class="container mt-3" id="platos" v-if="this.platosByCalorias.length > 0">
     <div class="card-body table-responsive p-0">
            <table class="table table-hover">
              <tbody>
                <tr>
                  <th>Plato</th>
                  <th>Cantidad</th>
                  <th>Calorias</th>
                  <th>Funcion</th>
                </tr>
                <tr v-for="plt in platosByCalorias" v-bind:key="plt.id" v-bind:value="plt.id">
                  <td>{{plt.nombre}}</td>
                  <td>
                    <input
                  type="number"
                    v-model="plt.cantidad"
                  placeholder="Cantidad"
                  class="form-control"/>
                  </td>
                  <td>{{plt.calorias}}</td>
                  <td>
                    <button
                      type="submit"
                      class="btn btn-outline-success btn-sm"
                     @click="addPlato(plt)"
                    >Agregar</button>
                    <button
                      type="submit"
                      class="btn btn-outline-danger btn-sm"
                      onclick="return confirm('Quiere Actualizar este Registro?')"
                    >Modificar</button>
                  </td>
                </tr>

              </tbody>
            </table>
          </div>
          <!-- /.card-body -->

        </div>

        </form>
      </div>
    </section>
  </div>
</template>
<script>
export default {
  data() {
    return {
        platosByCalorias:{},
      calorias: "",
      enfermedad: "",
      genero: "",
      edad: "",
      altura: "",
      peso: "",
      actividad: "",
      cantidad:"",
            plato: 0,
            cantidad: 0,
            caloria:0,
      form: new Form({
        detalles:[{
            plato: 0,
            cantidad: 0,
            caloria:0,
        }]

      })
    };
  },
  methods: {
    create() {

    },
    addPlato(pt){
        this.plato=pt.id
        this.cantidad=pt.cantidad
        this.calorias=pt.calorias
        //     cantidad: me.cantidad,
        // let me=this;
        this.form.detalles.push({
            plato: this.plato,
            cantidad: this.cantidad,
            caloria: this.calorias
        })
        this.clearValues();
    // console.log(pt.id,pt.cantidad)


    },
    clearValues(){
        this.plato=0
        this.cantidad=0
        this.calirias=0
    },
    generar(cal){
        axios.get("/generar/" + cal).then(response => {
        this.platosByCalorias = response.data;
      });
    },
    calculate() {
      //pie a cm 30.48
      //lb a kg 0.453592
      if (this.enfermedad == "NO") {
        if (this.genero == "m") {
          //[(66 + (13.7 x tu peso en kilos) + (5 x altura en cm) – (6.8 x tu edad)] x factor de actividad
          this.calorias =
            (66 +
              13.7 * (this.peso * 0.453592) +
              5 * (this.altura * 30.48) -
              6.8 * this.edad) *
            this.actividad;
          //   console.log(this.calorias);
        } else if (this.genero == "f") {
          //[(655 + (9.6 x tu peso en kilos) + (1.8 x altura en cm) – (4.7 x tu edad)] x factor de actividad
          this.calorias =
            (665 +
              9.6 * (this.peso * 0.453592) +
              1.8 * (this.altura * 30.48) -
              4.7 * this.edad) *
            this.actividad;
          //   console.log(this.calorias);
        } else {
          toast.fire({
            type: "error",
            title: "Seleccione Datos"
          });
        }
      } else if(this.enfermedad == "Diabetico") {
        //diabetico
        if (this.genero == "m") {
          this.calorias =
            (30 +
              13.7 * (this.peso * 0.453592) +
              5 * (this.altura * 30.48) -
              6.8 * this.edad) *
            this.actividad;
        } else if (this.genero == "f") {
          this.calorias =
            (540 +
              9.6 * (this.peso * 0.453592) +
              1.8 * (this.altura * 30.48) -
              4.7 * this.edad) *
            this.actividad;
        } else {
          toast.fire({
            type: "error",
            title: "Seleccione Datos"
          });
        }
      }
      this.generar(this.calorias);
    }
  }
};
</script>
