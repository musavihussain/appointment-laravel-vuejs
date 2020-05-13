import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import Dashboard from '../components/Dashboard';
import Login from '../components/Login';

const routes = [
    { path: '/home', component: Dashboard },
    { path: '/login', component: Login },
]


const router = new VueRouter({
    routes,
    mode : 'history'
})

export default router
