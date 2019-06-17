<template>
    <div class="container">
        <div class="form-group">
            <div class="row">
                <label for="" class="col-md-2">Nombre</label>
                <div class="col-md-6"><input type="text" name="name" class="form-control"></div>
                <div class="clearfix"></div>
            </div>
        </div>

    <div class="form-group mt-2">
        <div class="row">
            <label class="col-md-2">Permission</label>
                <div class="col-md-6">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" v-model="selectAll">
                            <label class="form-check-label">Seleccionar Todo</label>
                        </div>
                    </div>
                </div>

    <div class="card">
        <section class="content">
            <div class="container-fluid">
                <div class="form-check" v-for="permn in Permissions" :key="permn.id">
                    <input class="form-check-input" type="checkbox"  :value="permn.id" v-model="selected">
                    <label class="form-check-label">{{permn.name}}</label>
                </div>
            </div>
        </section>
        </div>
        <div class="clearfix"> {{selected}}</div>
    </div>

    </div>
</template>

<script>
export default {
    data(){
        return{
            selected:[],
            Permissions:{}
            }
    },
    methods:{
        loadPermissions(){
            axios.get("/show_permissions").then(({ data }) => (this.Permissions = data));
            },
            createRole(){

            }
    },
    mounted() {
        console.log('Component Permissions mounted.')
    },
    created() {
        this.loadPermissions();
    }, computed: {
        selectAll: {
            get: function () {
                return this.Permissions ? this.selected.length == this.Permissions.length : false;
            },
            set: function (value) {
                var selected = [];

                if (value) {
                    this.Permissions.forEach(function (permn) {
                        selected.push(permn.id);
                    });
                }

                this.selected = selected;
            }
        }
    }
}
</script>
