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
                      <a
                        class="btn btn-outline-primary mt-2"
                        @click="loadPlato(plt)"
                      >{{plt.nombre}}</a>
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
                    <td>Producto</td>
                    <td>Precio</td>
                    <td>Cantidad</td>
                    <td>Descuento</td>
                    <td>
                        <a class="btn btn-outline-warning" @click="disabled = !disabled">
                        <i class="fas fa-lock"></i>
                        </a>
                    </td>
                  </tr>
                </thead>
                <tbody>
                   <tr>
                    <td>
                        <input type="text" :value="platoSelected" name="plato" class="form-control" disabled>
                    </td>
                    <td>
                        <input type="text" :value="precioSelected" name="plato" class="form-control" disabled>
                    </td>
                    <td>
                        <input type="text" name="cantidad"
                        v-model="form.detalles.cantidad" class="form-control" required>
                    </td>
                    <td>
                        <input type="text" name="descuento"
                        v-model="form.detalles.descuento" class="form-control" :disabled="disabled">
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
        disabled: true,
        platoIdSelected:"",
        platoSelected: "",
        precioSelected:"",
        platoByCat: {},
        form: new Form({
            cliente: "",
            detalles: [
            {
                id:"",
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
        this.platoSelected=plat.nombre;
        this.precioSelected=plat.precio;
    },
    unlockDesc()
    {

    }
  },
  computed:{

  },
  mounted() {
    console.log("Create Nota Venta Mounted");
  }
};
</script>
