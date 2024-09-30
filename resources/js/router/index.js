import { createRouter, createWebHistory } from 'vue-router';
import MangaList from '../views/MangaList.vue';
import MangaDetail from '../views/MangaDetail.vue'
import VolumeReader from '../views/VolumeReader.vue';


const routes = [
  {
    path: '/',
    name: 'MangaList',
    component: MangaList,
  },


  {
    path: '/manga/:id',
    name: 'MangaDetail',
    component: MangaDetail,
  },

  {
    path: '/volumes/:id',
    name: 'VolumeReader',
    component: VolumeReader,
  },
  // Altre rotte...
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;


