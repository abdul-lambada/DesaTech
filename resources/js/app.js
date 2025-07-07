import { createApp } from 'vue';
import { createRouter, createWebHistory } from 'vue-router';
import App from './App.vue';

// Import components
import Home from './components/Home.vue';
import ProfilDesa from './components/ProfilDesa.vue';
import Layanan from './components/Layanan.vue';
import DataDesa from './components/DataDesa.vue';
import Berita from './components/Berita.vue';
import Transparansi from './components/Transparansi.vue';
import Kontak from './components/Kontak.vue';

// Import layouts
import MainLayout from './layouts/MainLayout.vue';

// Create router
const routes = [
    {
        path: '/',
        component: MainLayout,
        children: [
            { path: '', component: Home },
            { path: '/profil-desa', component: ProfilDesa },
            { path: '/layanan', component: Layanan },
            { path: '/data-desa', component: DataDesa },
            { path: '/berita', component: Berita },
            { path: '/transparansi', component: Transparansi },
            { path: '/kontak', component: Kontak },
        ]
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes,
    scrollBehavior(to, from, savedPosition) {
        if (savedPosition) {
            return savedPosition;
        } else {
            return { top: 0 };
        }
    }
});

// Create Vue app
const app = createApp(App);

// Use router
app.use(router);

// Mount app
app.mount('#app');
