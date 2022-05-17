const Home = ()=> import('./componentes/Home.vue')
//importamos componentes para proveedores
const Editar = ()=> import('./componentes/proveedor/Editar.vue')
const Crear = ()=> import('./componentes/proveedor/Crear.vue')
const Mostrar = ()=> import('./componentes/proveedor/Mostrar.vue')

export const Routes =[
    {
        name:'home',
        path:'/',
        component:Home
    },
    {
        name:'mostrarProveedor',
        path:'/proveedores',
        component:Mostrar
    },
    {
        name:'crearProveedor',
        path:'/crear',
        component:Crear
    },
    {
        name:'editarProveedor',
        path:'/editar/:id',
        component:Editar
    },
];