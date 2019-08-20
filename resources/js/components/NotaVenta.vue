<template>
  <div class="container">
    <div class="card card-warning card-outline">
      <div class="card-header">
        <div class="col-md-6">
          <div class="form-group">
            <div class="row">
              <label class="col-md-3">Cliente:</label>
              <div class="col-md-6">
                <select v-model="form.cliente" class="form-control">
                  <option disabled value>Seleccionar Cliente</option>
                  <option
                    v-for="client in clientes"
                    v-bind:key="client.id"
                    v-bind:value="client.id"
                  >{{client.name}}</option>
                </select>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
      </div>

      <div class="card-body box-profile table-responsive p-0">
        <div class="container mt-3">
          <div class="col-md-6">
            <div class="form-group">
              <div class="row">
                <label class="col-md-3">Categorias:</label>
              </div>
            </div>
          </div>

          <div class="card">
            <div class="table-responsive">
              <table class="table table-borderless">
                <tbody>
                  <tr>
                    <td v-for="cat in categorias" v-bind:key="cat.id" v-bind:value="cat.id">
                      <a
                        class="btn btn-outline-primary mt-2"
                        @click="selectPlato(cat.id)"
                      >{{cat.nombre}}</a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <div class="container mt-3" id="platos" v-if="this.platoByCat.length > 0">
          <div class="col-md-6">
            <div class="form-group">
              <div class="row">
                <label class="col-md-3">Platos:</label>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="table-responsive">
              <table class="table table-borderless">
                <tbody>
                  <tr>
                    <td v-for="plt in platoByCat" v-bind:key="plt.id" v-bind:value="plt.id">
                      <a class="btn btn-outline-primary mt-2" @click="loadPlato(plt)">{{plt.nombre}}</a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!--.container-->

        <div class="container mt-3">
          <div class="card">
            <div class="table-responsive">
              <table class="table table-border">
                <thead>
                  <tr>
                    <td>Opcion</td>
                    <td>Nombre</td>
                    <td>Precio</td>
                    <td>Cantidad</td>
                    <td>
                      Descuento
                      <a class="btn btn-outline-warning" @click="disabled = !disabled">
                        <i class="fas fa-lock"></i>
                      </a>
                    </td>
                    <td>
                      <a class="btn btn-outline-success" @click="addPlato">
                        <i class="fas fa-arrow-down"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <h3>Plato:</h3>
                    </td>
                    <td>
                      <input type="text" name="plato" class="form-control" v-model="plato" disabled />
                    </td>
                    <td>
                      <input
                        type="text"
                        name="precio"
                        class="form-control"
                        v-model="precio"
                        disabled
                      />
                    </td>
                    <td>
                      <input
                        type="text"
                        name="cantidad"
                        class="form-control"
                        v-model="cantidad"
                        required
                      />
                    </td>
                    <td>
                      <input
                        type="text"
                        name="descuento"
                        class="form-control"
                        v-model="descuento"
                        :disabled="disabled"
                      />
                    </td>
                    <td>
                      <h3>Sub-Total</h3>
                    </td>
                  </tr>
                </thead>
                <tbody v-if="form.detalles.length">
                  <!--arraydetalles estaba antes-->
                  <tr v-for="(detalle,index) in form.detalles" v-bind:key="detalle.id">
                    <td>
                      <button
                        @click="eliminarDetalle(index)"
                        type="button"
                        class="btn btn-outline-danger btn-sm"
                      >
                        <i class="fas fa-trash"></i>
                      </button>
                    </td>
                    <td v-text="detalle.plato"></td>
                    <td>
                      <input
                        v-model="detalle.precio"
                        type="number"
                        value="3"
                        class="form-control"
                        disabled
                      />
                    </td>
                    <td>
                      <input
                        v-model="detalle.cantidad"
                        type="number"
                        value="3"
                        class="form-control"
                        disabled
                      />
                    </td>
                    <td>
                      <input
                        v-model="detalle.descuento"
                        type="number"
                        value="3"
                        class="form-control"
                        disabled
                      />
                    </td>
                    <td>{{(detalle.precio * detalle.cantidad)-detalle.descuento}}</td>
                  </tr>
                  <tr class="table-warning">
                    <td colspan="5" align="right"><strong>Total Neto:</strong></td>
                    <td >$ {{this.total=calcularTotal()}}</td>
                  </tr>
                  <tr>
                    <td colspan="5" align="right">
                        <button @click="facturar()" type="button" class="btn btn-outline-success">
                        Facturar<i class="fas fa-shopping-cart"></i>
                      </button>
                    </td>
                  </tr>
                </tbody>
                <tbody v-else>
                  <tr>
                    <td colspan="5">NO hay artículos agregados</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!--.container-->
      </div>
      <!--.card-body-->
    </div>
  </div>
</template>
<script>
export default {
  props: ["clientes", "categorias"],
  data() {
    return {
      disabled: true,
      platoByCat: {},
      id: "",
      plato: "",
      cantidad: "",
      precio: "",
      descuento: "",
      form: new Form({
        cliente: "",
        total:"",
        detalles: [
          {
            id: "",
            plato: "",
            cantidad: "",
            precio: "",
            descuento: ""
          }
        ]
      })
    };
  },
  methods: {
    selectPlato(catId) {
      axios.get("/notaVentas/" + catId).then(response => {
        this.platoByCat = response.data;
      });
    },
    loadPlato(plat) {
      this.id = plat.id;
      this.plato = plat.nombre;
      this.precio = plat.precio;
    },
    addPlato() {
      let me = this;
      if (me.id == 0 || me.cantidad == 0 || me.precio == 0) {
        toast.fire({ type: "warning", title: "Debe introducir el Articulo y la Cantidad" });
      } else {
        if (me.findArtRepetido(me.id)) {
          toast.fire({ type: "warning", title: "Receta Creada Exitosamente" });
        } else {
          me.form.detalles.push({
            id: me.id,
            plato: me.plato,
            cantidad: me.cantidad,
            precio: me.precio,
            descuento: me.descuento
          });
          (me.id = 0),
            (me.plato = ""),
            (me.cantidad = 0),
            (me.precio = 0),
            (me.descuento = 0);
        }
      }
    },
    eliminarDetalle(index) {
      let me = this;
      me.form.detalles.splice(index, 1);
    },
    findArtRepetido(id) {
      var sw = 0;
      for (var i = 0; i < this.form.detalles.length; i++) {
        if (this.form.detalles[i].id == id) {
          sw = true;
        }
      }
      return false;
    },
    calcularTotal(){
        var resultado=0.0;
        for(var i=0;i<this.form.detalles.length;i++){
            resultado=resultado+(this.form.detalles[i].precio*this.form.detalles[i].cantidad)
        }
            return resultado;
    },
    facturar(){
        if (this.form.cliente == 0) {
        toast.fire({ type: "warning", title: "Debe introducir un Articulo y/o Cliente" });
      }else{
        this.$Progress.start();
        this.form
        .post("/notaVentas")
        .then(() => {
          toast.fire({
            type: "success",
            title: "Nota de VentaRegistrada!"
          });
          this.$Progress.finish();
        })
        .catch(() => {
          this.$Progress.fail();
        });

      }
    }
  },
  computed: {},
  mounted() {
    this.eliminarDetalle(0);
    console.log("Create Nota Venta Mounted");
  }
};
</script>
