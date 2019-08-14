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
            v-model="nombre"
                placeholder=""
                class="form-control"></div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <label for="" class="col-md-2">Descripcion</label>
            <div class="col-md-6"><input type="text" name="descripcion"
            v-model="descripcion"
                placeholder=""
            class="form-control"></div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <label for="" class="col-md-2">Porciones</label>
            <div class="col-md-6"><input type="text" name="porciones"
            v-model="porciones"
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
        <div class="row" v-for="(detalle,index) in detalles" v-bind:key="index">
            <label for="" class="col-md-2">Producto ({{index}})</label>

            <div class="col-md-3">
                <select name="producto"
                v-model="detalle.producto"
                class="form-control">
                    <option value="">Seleccionar Producto</option>
                    <option value=""></option>
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
            nombre:'',
            descripcion:'',
            porciones:'',
            detalles:[{
                producto:'',
                cantidad:''
            }]
        };
    },
    methods:{
        addNewProduct(){
            this.detalles.push({
                producto:'',
                cantidad:''
            })
        },
        removeProduct(index){
            this.detalles.splice(index,1)
        }
    },
    mounted(){
        console.log("Create Receta Mounted");
    }
};
</script>
