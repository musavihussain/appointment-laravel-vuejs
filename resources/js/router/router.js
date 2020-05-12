import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import Dashboard from '../components/Dashboard';


const routes = [
    { path: '/home', component: Dashboard },
]


const router = new VueRouter({
    routes,
    mode : 'history'
})

export default router
