<template>
<!-- /.content-header -->
<div class="card">
    <section class="content">
        <div class="container-fluid mt-3">
            <form @submit.prevent="createTransaccion()">

             <div class="form-group">
        <div class="row">
            <label for="" class="col-md-2">Tipo Transaccion</label>
            <div class="col-md-6">
                 <select class="form-control" v-model="form.tipo_transaccion" required
                  :class="{ 'is-invalid': form.errors.has('tipo_transaccion') }">
                    <option disabled value="">Seleccionar Producto</option>
                    <option value="ingreso">Ingreso</option>
                    <option value="egreso">Egreso</option>
                </select>
            </div>
                    <has-error :form="form" field="tipo_transaccion"></has-error>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <label for="" class="col-md-2">Concepto</label>
            <div class="col-md-6"><input type="text" name="concepto"
            v-model="form.concepto"
            placeholder=""  :class="{ 'is-invalid': form.errors.has('concepto') }"
            class="form-control"></div>
                    <has-error :form="form" field="concepto"></has-error>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <label for="" class="col-md-2">Agregar Insumo</label>
            <div class="col-md-6">
                 <a class="btn btn-outline-primary" @click="addNewIng">
                        <i class="fas fa-plus-square"></i>
                    </a>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

      <div class="form-group">
        <div class="row" v-for="(detalle,index) in form.detalles" v-bind:key="index">
            <label for="" class="col-md-2">Insumo ({{index+1}})</label>

            <div class="col-md-3">
                <select class="form-control" v-model="detalle.insumo" required>
                    <option disabled value="">Seleccionar Insumo</option>
                    <option v-for="insm in insumos" v-bind:key="insm.id"
                    v-bind:value="insm.id">{{insm.nombre}}</option>
                </select>
                 <has-error :form="form" field="insumo"></has-error>
            </div>

            <div class="col-md-3">
            <input type="text" name="cantidad"
            v-model="detalle.cantidad" placeholder="cantidad" class="form-control" required>
                <has-error :form="form" field="cantidad"></has-error>
            </div>

             <div class="col-md-2">
                <div class="form-group">
                    <a class="btn btn-outline-danger" @click="removeIng(index)">
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
    props: ['usuario','insumos'],
    data(){
        return{
            insumo:'',
            recetas: {}, //object
            form: new Form({
                usuario:this.usuario,
                tipo_transaccion:'',
                concepto:'',
                detalles:[{
                    insumo:'',
                    cantidad:''
                }]
            })
        };
    },
    methods:{
        addNewIng(){
            this.form.detalles.push({
                insumo:'',
                cantidad:''
            })
        },
        removeIng(index){
            if(index>=1){
            this.form.detalles.splice(index,1)
            }else{
                 toast.fire({
                type: "warning",
                title: "Necesita al menos un Insumo"
            });
            }
        },
        createTransaccion() {
            this.$Progress.start();
            this.form.post('/transacciones')
            .then(() => {
            toast.fire({
                type: "success",
                title: "Transaccion Creada Exitosamente"
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
        clearForm(){
            this.form.producto='',
               this.form. tipo_transaccion='',
               this.form. concepto='',
               this.form. detalles.length=0;
        }
    },
    mounted(){
        console.log("Create Ingreso/Egreso Mounted");
    }
};
</script>
