<template>
  <!-- /.content-header -->
  <div class="card">
    <section class="content">
      <div class="container-fluid mt-3">
        <form @submit.prevent="create()">
          <div class="form-group">
            <div class="row">
              <label for class="col-md-2">Producto</label>
              <div class="col-md-6">
                <!-- <select
                  class="form-control"
                  v-model="form.producto"
                  required
                  :class="{ 'is-invalid': form.errors.has('producto') }"
                >
                  <option disabled value>Seleccionar Producto</option>
                  <option
                    v-for="producto in productos"
                    v-bind:key="producto.id"
                    v-bind:value="producto.id"
                  >{{producto.nombre}}</option>
                </select> -->

                <multiselect
                v-model="form.producto"
                :options="productos"
                track-by="nombre" label="nombre"
                :close-on-select="true"
                :show-labels="false"
                placeholder="Seleccione un Producto"
                ></multiselect>


              </div>
              <has-error :form="form" field="producto"></has-error>
              <div class="clearfix"></div>
            </div>
          </div>

          <div class="form-group">
            <div class="row">
              <label for class="col-md-2">Descripcion</label>
              <div class="col-md-6">
                <input
                  type="text"
                  name="descripcion"
                  v-model="form.descripcion"
                  placeholder
                  :class="{ 'is-invalid': form.errors.has('descripcion') }"
                  class="form-control"
                />
              </div>
              <has-error :form="form" field="descripcion"></has-error>
              <div class="clearfix"></div>
            </div>
          </div>

          <div class="form-group">
            <div class="row">
              <label for class="col-md-2">Porciones</label>
              <div class="col-md-6">
                <input
                  type="text"
                  name="porciones"
                  v-model="form.porciones"
                  placeholder
                  :class="{ 'is-invalid': form.errors.has('porciones') }"
                  class="form-control"
                  required
                />
              </div>
              <has-error :form="form" field="porciones"></has-error>
              <div class="clearfix"></div>
            </div>
          </div>

          <div class="form-group">
            <div class="row">
              <label for class="col-md-2">Insumo</label>

              <div class="col-md-3">
                <!-- <select class="form-control" v-model="insumo" required>
                  <option disabled value>Seleccionar Insumo</option>
                  <option
                    v-for="insm in insumos"
                    v-bind:key="insm.id"
                    v-bind:value="insm.id"
                  >{{insm.nombre}}</option>
                </select> -->
                 <multiselect
                v-model="insumo"
                :options="insumos"
                track-by="nombre" label="nombre"
                :close-on-select="true"
                :show-labels="false"
                placeholder="Seleccione un Insumo"
                ></multiselect>
                <has-error :form="form" field="insumo"></has-error>
              </div>

              <div class="col-md-3">
                <input
                  type="number"
                  name="cantidad"
                  v-model="cantidad"
                  placeholder="cantidad"
                  class="form-control"
                  required
                />
                <has-error :form="form" field="cantidad"></has-error>
              </div>

              <div class="col-md-2">
                <div class="form-group">
                  <a class="btn btn-outline-primary" @click="addNew">
                    <i class="fas fa-plus-circle"></i>
                  </a>
                </div>
              </div>

              <div class="clearfix"></div>
            </div>

            <div class="row" v-for="(detalle,index) in form.detalles" v-bind:key="index">
              <label for class="col-md-2">Insumo ({{index+1}})</label>

              <div class="col-md-3">
                <!-- <select class="form-control" v-model="detalle.insumo" disabled>
                  <option disabled value>Seleccionar Insumo</option>
                  <option
                    v-for="insm in insumos"
                    v-bind:key="insm.id"
                    v-bind:value="insm.id"
                  >{{insm.nombre}}</option>
                </select> -->
               <input
                  type="text"
                  name="insumo"
                  v-model="detalle.insumo"
                  class="form-control"
                  disabled
                />
                <has-error :form="form" field="insumo"></has-error>
              </div>

              <div class="col-md-3">
                <input
                  type="number"
                  name="cantidad"
                  v-model="detalle.cantidad"
                  class="form-control"
                  disabled
                />
                <has-error :form="form" field="cantidad"></has-error>
              </div>

              <div class="col-md-2">
                <div class="form-group">
                  <a class="btn btn-outline-danger" @click="eliminarDetalle(index)">
                    <i class="fas fa-minus-circle"></i>
                  </a>
                </div>
              </div>

              <div class="clearfix"></div>
            </div>
          </div>

          <div class="form-group">
            <input type="submit" class="btn btn-info" value="Save" />
          </div>
        </form>
      </div>
    </section>
  </div>
</template>
<script>
export default {
  props: ["productos", "insumos"],
  data() {
    return {
      insumo: {},
      cantidad: "",
      form: new Form({
        producto: "",
        descripcion: "",
        porciones: "",
        detalles: [
          {
            insumo: "",
            cantidad: ""
          }
        ]
      })
    };
  },
  methods: {
    addNew() {
      if (this.find(this.insumo.nombre)) {
        toast.fire({ type: "warning", title: "Insumo Repetido" });
      } else {
        this.form.detalles.push({
          insumo: this.insumo.nombre,
          cantidad: this.cantidad
        });
      }
    },
    eliminarDetalle(index) {
      this.form.detalles.splice(index, 1);
    },
    create() {
      this.$Progress.start();
      this.form
        .post("/recetas")
        .then(() => {
          toast.fire({
            type: "success",
            title: "Receta Creada Exitosamente"
          });
          this.$Progress.finish();
          this.clearForm();
        })
        .catch(() => {
          this.$Progress.fail();
          toast.fire({
            type: "error",
            title: "Error en Insercion de Datos"
          });
        });
    },
    clearForm() {
      (this.form.producto = ""),
        (this.form.descripcion = ""),
        (this.form.porciones = ""),
        (this.insumo = ""),
        (this.cantidad = ""),
        (this.form.detalles.length = 0);
    },
    find(insumo) {
      var sw = 0;
      for (var i = 0; i < this.form.detalles.length; i++) {
        if (this.form.detalles[i].insumo == insumo) {
          sw = true;
        }
      }
      return sw;
    }
  },
  mounted() {
    this.eliminarDetalle(0);
    console.log("Create Receta Mounted");
  }
};
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
