import { createRouter, createWebHistory } from 'vue-router';

const routes = [
  {
    path: '/',
    name: 'Home',
    component: () => import('../views/Home.vue'),
  },
  // Aggiungi altre rotte qui
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
