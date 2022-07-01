require('./bootstrap');

import Vue from 'vue'
// import * as Vue from 'vue'
// import * as Vue from "vue";
// import pagination from "vuejs-uib-pagination";

// Vue.use(pagination);



import VueRouter from 'vue-router'
Vue.use(VueRouter)


import VueQRCodeComponent from 'vue-qrcode-component'
Vue.component('qr-code', VueQRCodeComponent)

import VueBarcode from 'vue-barcode';
Vue.component('barcode', VueBarcode)

import { BModal , BButton  } from 'bootstrap-vue'
Vue.component('b-modal', BModal)
Vue.component('b-button', BButton)

window.ASSETURL = '/public/';
// window.ASSETURL = '/';

// Router Imported
import {routes} from './routes';

// Import helper class
import User from './helpers/User';
window.User = User

// import Noty from "noty";
// new Noty({
//     text: "Notification text"
//   }).show();
// Import Notification class
import Notification from './helpers/Notification';
window.Notification = Notification

// import { Bar } from 'vue-chartjs'
import { Bar } from 'vue-chartjs/legacy'
import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale } from 'chart.js'

ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale)

Vue.component('Bar', Bar);


// import vueselect from 'vue-select2';

// Vue.component('vue-select', vueselect)


Vue.component('pagination', require('laravel-vue-semantic-ui-pagination'));

//Swee alert 2 start
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
//Sweet alert 2 end
import Select2 from 'v-select2-component';

Vue.component('Select2', Select2);
window.Reload = new Vue();

const router = new VueRouter({
  routes,
  mode: 'history'
})

const app = new Vue({
    el: '#app',
    router
});

