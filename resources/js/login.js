// require('./bootstrap');
window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)
import User from './helpers/User';
window.User = User
import {routes} from './loginroutes';


import Swal from 'sweetalert2'
window.Swal = Swal;
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
});
window.Toast = Toast;

window.Reload = new Vue();

const router = new VueRouter({
  routes,
  mode: 'history'
})

const app = new Vue({
    el: '#app',
    router
});

