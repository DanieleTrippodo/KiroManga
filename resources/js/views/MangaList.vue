<template>
    <div>
      <h1>Lista dei Manga</h1>
      <div v-if="mangaList.length">
        <div v-for="manga in mangaList" :key="manga.id" class="manga-item">
          <img :src="`/storage/${manga.cover_image}`" :alt="manga.title" />
          <h2>{{ manga.title }}</h2>
          <p>{{ manga.description }}</p>
          <router-link :to="{ name: 'MangaDetail', params: { id: manga.id } }">Dettagli</router-link>
        </div>
      </div>
      <div v-else>
        <p>Nessun manga disponibile.</p>
      </div>
    </div>
  </template>

  <script>
  import axios from 'axios';

  export default {
    name: 'MangaList',
    data() {
      return {
        mangaList: [],
      };
    },
    created() {
      this.getMangaList();
    },
    methods: {
      async getMangaList() {
        try {
          const response = await axios.get('/api/manga');
          this.mangaList = response.data;
        } catch (error) {
          console.error('Errore nel recupero dei manga:', error);
        }
      },
    },
  };
  </script>

  <style scoped>
  .manga-item {
    /*  da aggiungere gli stili per ogni elemento manga */
  }
  </style>
