const Home = ()=> import('./componentes/Home.vue')
//importamos componentes para proveedores
const Proveedor = ()=> import('./componentes/proveedor/Proveedor.vue')

export const Routes =[
    {
        name:'home',
        path:'/',
        component:Home
    },
    {
        name:'mostrarProveedor',
        path:'/proveedores',
        component:Proveedor
    },
];