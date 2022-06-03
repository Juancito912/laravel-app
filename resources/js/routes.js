const ProveedorDetalle = ()=> import('./componentes/proveedor/ProveedorDetalle.vue')
//importamos componentes para proveedores
const Proveedor = ()=> import('./componentes/proveedor/Proveedor.vue')

export const Routes =[
    {
        name:'detalle',
        path:'/proveedor/:id',
        component:ProveedorDetalle
    },
    {
        name:'mostrarProveedor',
        path:'/proveedores',
        component:Proveedor
    },
];