import {createRouter, createWebHistory} from 'vue-router'
import Home from '../pages/Home.vue'
import About from '../pages/About.vue'
import Categories from '../pages/Categories.vue'
import Archive from '../pages/Archive.vue'
import Register from '../pages/Register.vue'
import Login from '../pages/Login.vue'
import Dashboard from '../pages/Dashboard.vue'
import CreateCategories from '../categories/CreateCategories.vue'
import EditCategories from '../categories/EditCategories.vue'
import ListCategories from '../categories/ListCategories.vue'
import CreatePosts from '../posts/CreatePosts.vue'
import SinglePost from '../posts/SinglePost.vue'

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: '/',
            name: 'Home',
            component: Home
        },
        {
            path: '/about',
            name: 'About',
            component: About
        },
        {
            path: '/categories',
            name: 'Categories',
            component: Categories
        },
        {
            path: '/archive',
            name: 'Archive',
            component: Archive
        },
        {
            path: '/register',
            name: 'Register',
            component: Register,
            meta: {requiresGuest: true}
        },
        {
            path: '/login',
            name: 'Login',
            component: Login,
            meta: {requiresGuest: true}
        },
        {
            path: '/dashboard',
            name: 'Dashboard',
            component: Dashboard,
            meta: {requiresAuth: true}
        },
        {
            path: '/categories/create',
            name: 'CreateCategories',
            component: CreateCategories,
            meta: {requiresAuth: true}
        },
        {
            path: '/categories/:id/edit',
            name: 'EditCategories',
            component: EditCategories,
            props: true,
            meta: {requiresAuth: true}
        },
        {
            path: '/categories/list',
            name: 'ListCategories',
            component: ListCategories,
            meta: {requiresAuth: true}
        },
        {
            path: '/posts/create',
            name: 'CreatePosts',
            component: CreatePosts,
            meta: {requiresAuth: true}
        },
        {
            path: '/posts/:slug',
            name: 'SinglePost',
            component: SinglePost,
            props: true,
        },

    ]
})

router.beforeEach((to, from) => {
    const authenticated = localStorage.getItem('authenticated')

    if (to.meta.requiresGuest && authenticated) {
        return {
            name: 'Dashboard'
        }
    } else if (to.meta.requiresAuth && !authenticated) {
        return {
            name: 'Login'
        }
    }
})

export default router
