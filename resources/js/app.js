require('./bootstrap');
import vue from 'vue';
window.Vue = vue;

import App from './componentes/App.vue';

import VueAxios from 'vue-axios';
import axios from 'axios';

import VueRouter from 'vue-router'
import {Routes} from './routes';
import Vue from 'vue';

Vue.use(VueRouter);
Vue.use(VueAxios,axios);
const router = new VueRouter({
    mode:'history',
    routes: Routes
});

const app = new Vue({
    el: '#app',
    router:router,
    render: h=> h(App)
});