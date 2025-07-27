import '../css/app.css';
import './bootstrap';

import { createApp } from 'vue';
import { createRouter, createWebHistory } from 'vue-router';
import App from './App.vue';

// Import layouts
import MainLayout from './layouts/MainLayout.vue';

// Import public components
import Home from './components/Home.vue';
import ProfilDesa from './components/ProfilDesa.vue';
import Layanan from './components/Layanan.vue';
import DataDesa from './components/DataDesa.vue';
import Berita from './components/Berita.vue';
import Transparansi from './components/Transparansi.vue';
import Kontak from './components/Kontak.vue';

// Import auth/dashboard components
import Login from './Pages/Auth/Login.vue';
import Register from './Pages/Auth/Register.vue';
import Dashboard from './components/Dashboard.vue';
import Profile from './Pages/Profile/Edit.vue';
import ForgotPassword from './Pages/Auth/ForgotPassword.vue';
import ResetPassword from './Pages/Auth/ResetPassword.vue';
import VerifyEmail from './Pages/Auth/VerifyEmail.vue';
import ConfirmPassword from './Pages/Auth/ConfirmPassword.vue';

const routes = [
    {
        path: '/',
        component: MainLayout,
        children: [
            { path: '', name: 'home', component: Home },
            { path: 'profil-desa', name: 'profil-desa', component: ProfilDesa },
            { path: 'layanan', name: 'layanan', component: Layanan },
            { path: 'data-desa', name: 'data-desa', component: DataDesa },
            { path: 'berita', name: 'berita', component: Berita },
            { path: 'transparansi', name: 'transparansi', component: Transparansi },
            { path: 'kontak', name: 'kontak', component: Kontak },
        ]
    },
    // Auth/dashboard routes (di luar MainLayout)
    { path: '/login', name: 'login', component: Login, meta: { guest: true } },
    { path: '/register', name: 'register', component: Register, meta: { guest: true } },
    { path: '/forgot-password', name: 'password.request', component: ForgotPassword, meta: { guest: true } },
    { path: '/reset-password/:token', name: 'password.reset', component: ResetPassword, meta: { guest: true } },
    { path: '/dashboard', name: 'dashboard', component: Dashboard, meta: { requiresAuth: true } },
    { path: '/profile', name: 'profile.edit', component: Profile, meta: { requiresAuth: true } },
    { path: '/verify-email', name: 'verification.notice', component: VerifyEmail, meta: { requiresAuth: true } },
    { path: '/confirm-password', name: 'password.confirm', component: ConfirmPassword, meta: { requiresAuth: true } },
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

// Navigation guards
router.beforeEach((to, from, next) => {
    const isAuthenticated = !!localStorage.getItem('auth_token');

    if (to.meta.requiresAuth && !isAuthenticated) {
        next('/login');
    } else if (to.meta.guest && isAuthenticated) {
        next('/dashboard');
    } else {
        next();
    }
});

const app = createApp(App);
app.use(router);
app.mount('#app');
