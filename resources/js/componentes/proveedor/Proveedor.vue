<template>
    <div class="ps-4 pe-4 pt-2">
        <div>
            <h1 class="text-center text-decoration-underline">Nuestros Proveedores</h1>
        </div>
        <div class='mb-2 mt-2'>
        <button @click="abrirModal('categoria','agregar')" class="btn btn-outline-success">
            <i class="fa-solid fa-circle-plus"></i> 
            Agregar Proveedor
        </button>
        </div>
        <div class="">
            <div class="table-responsive ">
                <table class="table table-bordered ">
                    <thead class="bg-info text-black">
                        <tr>
                            <th>ID</th>
                            <th>Nombre del Proveedor</th>
                            <th>Deuda</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="proveedor in proveedores" :key="proveedor.id">
                            <td class="p-3">{{proveedor.id}}</td>
                            <td class="p-3">{{proveedor.nombre}}</td>
                            <td class="p-3">$ {{proveedor.deuda}}</td>
                            <td> <button @click="abrirModal('categoria','editar',proveedor)"  class="btn btn-success" ><i class="fa-solid fa-pen-to-square"></i></button>
                            <button type="button" @click="borrarProveedor(proveedor.id)" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            <router-link :to="{name:'detalle',params:{id:proveedor.id}}" class="btn btn-warning">Ver Detalle</router-link>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div  class="modal" tabindex="-1" :class="{'mostrar': modal}">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header" v-bind:class="tituloModal=='Agregar Proveedor'?'bg-success':'bg-primary'">
                    <h5 class="modal-title" v-text="tituloModal"></h5>
                    <button type="button" class="btn-close" @click="cerrarModal()" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form  class="form-horizontal">
                        <div class="form-group">
                            <label for="nombre" class="col-sm-2 control-label">Nombre</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nombre" v-model="nombre">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="deuda" class="col-sm-2 control-label">Deuda</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="deuda" v-model="deuda">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" @click="cerrarModal()" class="btn btn-danger">Cerrar</button>
                    <button type="button" v-if="tituloModal=='Agregar Proveedor'" class="btn btn-primary" @click="agregarProveedor()">Agregar</button>
                    <button type="button" v-if="tituloModal=='Editar Proveedor'" @click="editarProveedor()" class="btn btn-primary">Editar</button>
                    
                </div>
                </div>
            </div>
        </div>
    </div>
    
</template>

<script>
export default {
    name:"proveedores",
    data(){
        return{
            nombre:'',
            deuda:'',
            proveedores:[],
            modal:false,
            tituloModal:'',
            proveedorID:0,    
        }
    },
    mounted(){
        this.mostrarProveedor()
    },
    methods:{
        async mostrarProveedor(){
            await this.axios.get('/api/proveedor')
                .then(response=>{
                    this.proveedores = response.data
                })
                .catch(err => {
                    this.proveedores = []
                })
        },
        abrirModal(modelo,action,data = []){
            switch(modelo){
                case 'categoria':{
                    switch(action){
                        case 'agregar':
                            this.tituloModal = 'Agregar Proveedor';
                            this.modal=true;
                            break;
                        case 'editar':
                            this.tituloModal = 'Editar Proveedor';
                            this.modal=true;
                            this.nombre = data.nombre;
                            this.deuda = data.deuda;
                            this.proveedorID = data.id;
                            break;
                    }
                }
            }
        },
        cerrarModal(){
            this.modal=false;
            this.tituloModal='';
            this.nombre='';
            this.deuda='';
        },
        agregarProveedor(){
            this.axios.post('/api/proveedor',{
                'nombre':this.nombre,
                deuda:this.deuda,
                })
                .then(response=>{
                    this.mostrarProveedor()
                    this.cerrarModal()
                })
                .catch(err => {
                    console.log(err)
                })
        },
        editarProveedor(){
            this.axios.put(`/api/proveedor/${this.proveedorID}`,{
                'nombre':this.nombre,
                deuda:this.deuda,
                })
                .then(response=>{
                    this.mostrarProveedor()
                    this.cerrarModal()
                })
                .catch(err => {
                    console.log(err)
                })
        },
        borrarProveedor(id){
            if(confirm("¿Desea eliminar este Proveedor?")){
                this.axios.delete(`/api/proveedor/${id}`)
                    .then(response => {
                        this.mostrarProveedor()
                    })
                    .catch(err  => {
                        console.log(err)
                    })
            }
        }
    }
}
</script>
<style>
.modal-content{
    width: 100%;
    position: absolute;
}
.mostrar{
    display: list-item;
    opacity: 1;
    position: absolute;
    background-color: #3c29297a;
}
</style>