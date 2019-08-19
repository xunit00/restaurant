<template>
  <div class="container">
    <div class="card card-warning card-outline">
      <div class="card-header">
        <div class="col-md-6">
          <div class="form-group">
            <div class="row">
              <label for class="col-md-3">Cliente:</label>
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
                <label for class="col-md-3">Categorias:</label>
              </div>
            </div>
          </div>

          <div class="card">
            <div class="table-responsive">
              <table class="table table-borderless">
                <tbody>
                  <tr>
                    <td v-for="cat in categorias" v-bind:key="cat.id" v-bind:value="cat.id">
                      <a class="btn btn-outline-primary mt-2" @click="selectPlato(cat.id)">{{cat.nombre}}</a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <div class="container mt-3" v-if="this.platoByCat.length > 0">
          <div class="card">
            <div class="table-responsive">
              <table class="table table-borderless">
                <tbody>
                  <tr>
                    <td v-for="plt in platoByCat" v-bind:key="plt.id" v-bind:value="plt.id">
                      <a class="btn btn-outline-primary mt-2">{{plt.nombre}}</a>
                    </td>
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
      ventas: {}, //object
      platoByCat:{},
      form: new Form({
        cliente: "",
        detalles: [
          {
            platos: "",
            cantidad: "",
            precion: "",
            descuento: ""
          }
        ]
      })
    };
  },
  methods: {
      selectPlato(catId){
        axios.get('/notaVentas/' + catId).then(response => {
            this.platoByCat = response.data;
        });
      },
      loadPlatoByCat(){

      }
  },
  mounted() {
    console.log("Create Nota Venta Mounted");
  }
};
</script>
