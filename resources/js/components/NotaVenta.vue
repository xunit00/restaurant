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
                    <td>Descuento  <a class="btn btn-outline-warning" @click="disabled = !disabled">
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
                        <input type="text" name="plato" class="form-control" v-model="plato" disabled>
                    </td>
                    <td>
                        <input type="text" name="precio" class="form-control" v-model="precio" disabled>
                    </td>
                    <td>
                        <input type="text" name="cantidad" class="form-control" v-model="cantidad" required>
                    </td>
                    <td>
                        <input type="text" name="descuento" class="form-control" v-model="descuento"  :disabled="disabled">
                    </td>
                    <td></td>
                  </tr>
                </thead>
                <tbody>
                   <tr v-for="(detalle,index) in arrayDetalle" v-bind:key="detalle.id">
                    <td>
                        <button @click="eliminarDetalle(index)" type="button" class="btn btn-outline-danger btn-sm">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                    <td v-text="detalle.plato">

                    </td>
                    <td>
                        <input v-model="detalle.precio" type="number" value="3" class="form-control">
                    </td>
                    <td>
                        <input v-model="detalle.cantidad" type="number" value="3" class="form-control">
                    </td>
                    <td>
                        {{detalle.precio * detalle.cantidad}}
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
        platoByCat: {},
        id:'',
        plato: '',
        cantidad: '',
        precio: '',
        descuento: '',
        arrayDetalle:[],
        form: new Form({
            cliente: '',
            detalles: [{
                id:'',
                plato: '',
                cantidad: '',
                precio: '',
                descuento: ''
            }]
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
        this.id=plat.id;
        this.plato=plat.nombre;
        this.precio=plat.precio;
    },
    addPlato()
    {
        let me=this;
        me.arrayDetalle.push({
            id: me.id,
            plato: me.plato,
            cantidad: me.cantidad,
            precio: me.precio,
            descuento: me.descuento
    })

    },
    eliminarDetalle(index){
        let me=this;
        me.arrayDetalle.splice(index,1)
    }
  },
  computed:{

  },
  mounted() {
    console.log("Create Nota Venta Mounted");
  }
};
</script>
