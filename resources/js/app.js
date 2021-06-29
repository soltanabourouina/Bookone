
require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';
vue.use (VueRouter);
import Clients from './components/Clients.vue'
//import Prospects from './components/Prospects.vue'
//import Configurations from './components/Configurations.vue'
import Motif_H from './components/Motif_H.vue'
const routes = [
   
    {
      path: '/clients',
      name: 'Clients',
      component: Clients
    },
  
    {
      path: '/prospects',
      name: 'Prospects',
      component: Prospects
    },
    {
      path: '/prospects/:prospectsId',
      name: 'prospects',
      component: Prospects
    },
    {
      path: '/configurations',
      name: 'Configurations',
      component: Configurations
    },
    {
      path: '/motif_h',
      name: 'Motif_H',
      component: Motif_H
    },
    
  ];
  const router = new VueRouter({routes});
  

  
const app = new Vue({
    el: '#app',
    router: router
});
