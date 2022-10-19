import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

//import NotFound from './pages/NotFound.vue';
import HomePage from './pages/HomePage.vue';
import BlogPage from './pages/BlogPage.vue';
import AboutPage from './pages/AboutPage.vue';
import ContactsPage from './pages/ContactsPage.vue';
import PostDetail from './pages/PostDetail.vue';


const router = new VueRouter({
    mode: 'history',
    routes: [
        // {
        //     path: '/*',
        //     name: 'not_found',
        //     component: NotFound
        // },
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
            path: '/blog/:slug',
            name: 'post_detail',
            component: PostDetail
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