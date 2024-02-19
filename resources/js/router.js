import {createRouter, createWebHistory} from 'vue-router';

export default createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/list',
            component: () => import('./components/List.vue'),
            name: 'user.list'
        },
        {
            path: '/statistics',
            component: () => import('./components/Statistics.vue'),
            name: 'statistics'
        },
    ]
});
