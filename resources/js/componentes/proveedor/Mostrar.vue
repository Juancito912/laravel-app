<template>
    <div class="row ">
        <div class="col-lg-12 mb-4">
        <router-link :to="{name:'crearProveedor'}" class="btn btn-success"><i class="fa-solid fa-circle-plus"></i></router-link>
        </div>
        <div class="col-12">
            <div class="table-responsive table-bordered">
                <table class="table bg-primary text-white">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Deuda</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="proveedor in proveedores" :key="proveedor.id">
                            <td v-text="proveedor.id"></td>
                            <td v-text="proveedor.nombre"></td>
                            <td v-text="proveedor.deuda"></td>
                            <td> <router-link :to="{name:'editarProveedor',params:{id:proveedor.id}}" class="btn btn-info" ><i class="fa-solid fa-pen-to-square"></i></router-link></td>
                            <a type="button" v-on:click="borrarProveedor(proveedor.id)" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name:"proveedores",
    data(){
        return{
            proveedores:[]
        }
    },
    mounted(){
        this.mostrarProveedor()
    },
    methods:{
        async mostrarProveedor(){
            await this.axios.get('/api/proveedor')
                .then(response=>{
                    this.proveedor = response.data()
                })
                .catch(err => {
                    this.proveedores = []
                })
                
        },
        borrarProveedor(id){
            if(confirm("¿Desea eliminar este Proveedor?")){
                this.axios.delete(`/api/proveedor/${id}`)
                    .then(response => {
                        this.mostrarProveedor();
                    })
                    .catch(err  => {
                        console.log(err);
                    })
            }
        }
    }
}
</script>