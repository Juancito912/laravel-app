<template>
    <div class="">
        <div>
            <h1 class="text-center text-decoration-underline">Bancos</h1>
        </div>
        <div class="mb-2 mt-2">
        <button @click="abrirModal('categoria','agregar')" class="btn btn-success"><i class="fa-solid fa-circle-plus"></i> Agregar</button>
        </div>
        <div class="">
            <div class="table-responsive ">
                <table class="table table-bordered ">
                    <thead class="bg-info text-black">
                        <tr>
                            <th>ID</th>
                            <th>Nombre del Banco</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="proveedor in proveedores" :key="proveedor.id">
                            <td class="p-3">{{proveedor.id}}</td>
                            <td class="p-3">{{proveedor.nombre}}</td>
                            <td class="p-3">$ {{proveedor.deuda}}</td>
                            <td> <button @click="abrirModal('categoria','editar',proveedor)" data-bs-target="#exampleModal" class="btn btn-info" ><i class="fa-solid fa-pen-to-square"></i></button>
                            <button type="button" @click="borrarProveedor(proveedor.id)" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div id="exampleModal" class="modal" tabindex="-1" :class="{'mostrar': modal}">
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