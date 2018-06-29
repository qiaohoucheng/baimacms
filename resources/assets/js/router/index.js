import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

export default new VueRouter({
    saveScrollPosition: true,
    routes: [
        {
            name: 'login',
            path: '/login',
            component: resolve => void(require(['../views/login.vue'], resolve))
        }
    ]
});