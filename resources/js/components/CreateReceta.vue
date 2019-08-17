<template>
<!-- /.content-header -->
<div class="card">
    <section class="content">
        <div class="container-fluid mt-3">
            <form @submit.prevent="createReceta()">

             <div class="form-group">
        <div class="row">
            <label for="" class="col-md-2">Plato</label>
            <div class="col-md-6">
                 <select class="form-control" v-model="form.plato"
                  :class="{ 'is-invalid': form.errors.has('plato') }">
                    <option disabled value="">Seleccionar Plato</option>
                    <option v-for="plato in platos" v-bind:key="plato.id"
                    v-bind:value="plato.id">{{plato.nombre}}</option>
                </select>
            </div>
                    <has-error :form="form" field="plato"></has-error>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <label for="" class="col-md-2">Descripcion</label>
            <div class="col-md-6"><input type="text" name="descripcion"
            v-model="form.descripcion"
            placeholder=""  :class="{ 'is-invalid': form.errors.has('descripcion') }"
            class="form-control"></div>
                    <has-error :form="form" field="descripcion"></has-error>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <label for="" class="col-md-2">Porciones</label>
            <div class="col-md-6"><input type="text" name="porciones"
            v-model="form.porciones"
            placeholder="" :class="{ 'is-invalid': form.errors.has('porciones') }"
            class="form-control"></div>
                    <has-error :form="form" field="porciones"></has-error>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <label for="" class="col-md-2">Agregar Producto</label>
            <div class="col-md-6">
                 <a class="btn btn-outline-primary" @click="addNewProduct">
                        <i class="fas fa-plus-square"></i>
                    </a>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

      <div class="form-group">
        <div class="row" v-for="(detalle,index) in form.detalles" v-bind:key="index">
            <label for="" class="col-md-2">Producto ({{index+1}})</label>

            <div class="col-md-3">
                <select class="form-control" v-model="detalle.producto">
                    <option disabled value="">Seleccionar Producto</option>
                    <option v-for="prod in productos" v-bind:key="prod.id"
                    v-bind:value="prod.id">{{prod.nombre}}</option>
                </select>
            </div>

            <div class="col-md-3">
            <input type="text" name="cantidad"
            v-model="detalle.cantidad"
            placeholder="cantidad" class="form-control">
            </div>

             <div class="col-md-2">
                <div class="form-group">
                    <a class="btn btn-outline-danger" @click="removeProduct(index)">
                        <i class="fas fa-minus-circle"></i>
                    </a>
                </div>
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
</template>
<script>
export default {
    props: ['productos','platos'],
    data(){
        return{
            recetas: {}, //object
            form: new Form({
                plato:'',
                descripcion:'',
                porciones:'',
                detalles:[{
                    producto:'',
                    cantidad:''
                }]
            })
        };
    },
    methods:{
        addNewProduct(){
            this.form.detalles.push({
                producto:'',
                cantidad:''
            })
        },
        removeProduct(index){
            this.form.detalles.splice(index,1)
        },
        createReceta() {
            this.$Progress.start();
            this.form.post('/recetas')
            .then(() => {
            toast.fire({
                type: "success",
                title: "Receta Creada Exitosamente"
            });
               router.go('/dashboard')
          this.$Progress.finish();
        })
        .catch(() => {
          this.$Progress.fail();
        });
        }
    },
    mounted(){
        console.log("Create Receta Mounted");
    }
};
</script>
