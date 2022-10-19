import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

import HomePage from './pages/HomePage.vue';
import BlogPage from './pages/BlogPage.vue';
import AboutPage from './pages/AboutPage.vue';
import ContactsPage from './pages/ContactsPage.vue';


const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: HomePage
        },
        {
            path: '/blog',
            name: 'blog',
            component: BlogPage
        },
        {
            path: '/about',
            name: 'about',
            component: AboutPage
        },
        {
            path: '/contact',
            name: 'contacts',
            component: ContactsPage
        }
    ]
});

export default router;