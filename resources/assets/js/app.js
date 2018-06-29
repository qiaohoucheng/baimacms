require('./bootstrap');
window.Vue = require('vue');


import iView from 'iview';
import App from './app.vue';
import VueRouter from 'vue-router';
import 'iview/dist/styles/iview.css';
import routes from './router/index';

Vue.use(VueRouter);
Vue.use(iView);


const app = new Vue({
        el: '#app',
        router: routes,
        render: h => h(App)
});