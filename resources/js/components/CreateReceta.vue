<template>
<!-- /.content-header -->
<div class="card">
    <section class="content">
        <div class="container-fluid mt-3">
            <form action="" method="POST" enctype="multipart/form-data">

             <div class="form-group">
        <div class="row">
            <label for="" class="col-md-2">Nombre</label>
            <div class="col-md-6"><input type="text" name="nombre"
            v-model="form.nombre"
                placeholder=""
                class="form-control"></div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <label for="" class="col-md-2">Descripcion</label>
            <div class="col-md-6"><input type="text" name="descripcion"
            v-model="form.descripcion"
                placeholder=""
            class="form-control"></div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <label for="" class="col-md-2">Porciones</label>
            <div class="col-md-6"><input type="text" name="porciones"
            v-model="form.porciones"
                placeholder=""
            class="form-control"></div>
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
            <label for="" class="col-md-2">Producto ({{index}})</label>

            <div class="col-md-3">
                <select name="producto"
                v-model="detalle.producto"
                class="form-control">
                    <option value="0" disabled>Seleccionar Producto</option>
                    <option v-for="unidad in productos" :key="unidad.id"
                    >{{producto}}</option>
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
    data(){
        return{
            recetas:{},
            form: new Form({
                nombre:'',
                descripcion:'',
                porciones:'',
                detalles:[{
                    producto:'',
                    cantidad:''
                }]
            }),
            arrayProd:[]
        };
    },
    props: ['productos'],
    methods:{
        addNewProduct(){
            this.form.detalles.push({
                producto:'',
                cantidad:''
            })
        },
        removeProduct(index){
            this.form.detalles.splice(index,1)
        }
    },
    mounted(){
        console.log("Create Receta Mounted");
    },
    created(){

    }
};
</script>
