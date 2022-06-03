<template>
    <div>
        <div class="p-3">
            <p class="fs-5">Nombre del Proveedor: <strong>{{proveedor.nombre}}.</strong></p>
            <p class="fs-5">Deuda del Proveedor: <strong>${{proveedor.deuda}}.</strong></p>
        </div>
        <div class="">
            <div class="table-responsive ">
                <table class="table table-bordered ">
                    <thead class="bg-info text-black">
                        <tr>
                            <th>Nombre del Proseedor</th>
                            <th>Banco</th>
                            <th>Saldo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="cuenta in cuentas" :key="cuenta.id">
                            <td class="p-3">{{cuenta.poseedor}}</td>
                            <td class="p-3">{{cuenta.banco_id}}</td>
                            <td class="p-3">$ {{cuenta.saldo}}</td>
                            <td class="p-3"> {{cuenta.proveedor_id}}</td>
                            <td> <button @click="abrirModal('categoria','editar',cuenta)"  class="btn btn-success" ><i class="fa-solid fa-pen-to-square"></i></button>
                            <button type="button" @click="borrarcuenta(cuenta.id)" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
<script >
export default {
    name:'proveedor-detalle',
    data() {
        return{
            proveedor:{
                nombre:'',
                deuda:'',
                id:this.$route.params.id,
            },
            cuentas : [],
        }
    },
    mounted(){
        this.mostrarProveedor()
        this.mostrarCuentas()
    },
    methods: {
        async mostrarProveedor(){
            await this.axios.get('/api/proveedor/'+this.proveedor.id)
                .then(response=>{
                    this.proveedor=response.data
                })
                .catch(err => {
                    this.proveedor = {}
                })
        },
        async mostrarCuentas(){
            await this.axios.get('/cuenta_corriente/showProveedor')
                .then(response=>{
                    this.cuentas = response.data
                })
                .catch(err => {
                    this.cuentas = []
                })
        },
    }
}
</script>