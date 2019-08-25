/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

window.Fire = new Vue();

//paginacion vuejs
Vue.component('pagination', require('laravel-vue-pagination'));

import BootstrapVue from 'bootstrap-vue'
Vue.use(BootstrapVue)

//validaciones
import { Form, HasError, AlertError } from 'vform';
window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

//popup alert
import swal from 'sweetalert2'
window.swal = swal;

//alertas
const toast = swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 5000//5k
});
window.toast = toast;

//progress bar
import VueProgressBar from 'vue-progressbar'
Vue.use(VueProgressBar, options)
const options = {
    color: '#bffaf3',
    failedColor: '#874b4b',
    thickness: '10px',
    transition: {
        speed: '0.5s',
        opacity: '0.6s',
        termination: 300
    },
    autoRevert: true,
    location: 'left',
    inverse: false
}

//rutas
import VueRouter from 'vue-router'
Vue.use(VueRouter)

let routes = [
    // { path: '/users', component: require('./components/Configuracion/Users.vue').default },
    // { path: '/roles', component: require('./components/Configuracion/Roles.vue').default },
]

const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
})

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));


// Vue.component('order-progress', require('./components/OrderProgress.vue').default);
Vue.component('not-found', require('./components/NotFound.vue').default);
Vue.component('order-notifications', require('./components/OrderNotifications.vue').default);
Vue.component('create-receta', require('./components/CreateReceta.vue').default);
Vue.component('nota-venta', require('./components/NotaVenta.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router,
    mounted() {
        Echo.channel('order-tracker')
        .listen('OrderStatusChanged', (e) => {
          console.log('Escuchando Evento')
        });
      }
});
