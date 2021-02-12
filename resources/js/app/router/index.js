import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '@/app/ui/pages/Home'
import Works from '@/app/ui/pages/Works'
import Skills from '@/app/ui/pages/Skills'
import About from '@/app/ui/pages/About'

Vue.use(VueRouter)

const routes = [
    {
        path: '/',
        name: 'Home',
        component: Home
    },
    {
        path: '/works',
        name: 'Works',
        component: Works
    },
    {
        path: '/skills',
        name: 'Skills',
        component: Skills
    },
    {
        path: '/about',
        name: 'About',
        component: About
        // route level code-splitting
        // this generates a separate chunk (about.[hash].js) for this route
        // which is lazy-loaded when the route is visited.
        // component: () => import(/* webpackChunkName: "about" */ '../pages/About.vue')
    }
]

const router = new VueRouter({
    mode: 'history',
    base: process.env.BASE_URL,
    routes
})

export default router
