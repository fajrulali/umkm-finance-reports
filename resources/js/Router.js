import { createRouter, createWebHistory } from 'vue-router';
import Login from './pages/Login.vue';
import Dashboard from './pages/Dashboard.vue';

const routes = [
    { path: '/', component: Login, name: 'login' },
    { path: '/dashboard', component: Dashboard, name: 'dashboard' },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;