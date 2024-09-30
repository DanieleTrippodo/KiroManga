<template>
    <div>
      <h1>{{ manga.title }}</h1>
      <img :src="`/storage/${manga.cover_image}`" :alt="manga.title" />
      <p>{{ manga.description }}</p>
      <div>
        <h2>Volumi</h2>
        <ul>
          <li v-for="volume in manga.volumes" :key="volume.id">
            <router-link :to="{ name: 'VolumeReader', params: { id: volume.id } }">
              Volume {{ volume.volume_number }}
            </router-link>
          </li>
        </ul>
      </div>

      <!-- Sezione Per aggiungere ai preferiti -->
      <button v-if="isAuthenticated" @click="toggleFavorite">
        {{ isFavorite ? 'Rimuovi dai preferiti' : 'Aggiungi ai preferiti' }}
      </button>

      <!-- Aggiungi la sezione per i commenti -->
      <Comments :manga-id="manga.id" />
    </div>
  </template>

  <script>
  import axios from 'axios';
  import Comments from '../components/Comments.vue';

  export default {
    name: 'MangaDetail',
    components: {
      Comments,
    },
    data() {
      return {
        manga: {},
        isFavorite: false,
        isAuthenticated: false,
      };
    },
    created() {
        this.getMangaDetail();
        this.isAuthenticated = !!document.querySelector('meta[name="user-id"]');
        if (this.isAuthenticated) {
            this.checkFavorite();
        }
    },

    methods: {


    async toggleFavorite() {
        try {
            if (this.isFavorite) {
                await axios.delete(`/api/favorites/${this.$route.params.id}`);
        } else {
            await axios.post('/api/favorites', {
            manga_id: this.$route.params.id,
            });
        }
        this.isFavorite = !this.isFavorite;
        } catch (error) {
        console.error('Errore nella gestione dei preferiti:', error);
        }
    },



      async getMangaDetail() {
        try {
          const response = await axios.get(`/api/manga/${this.$route.params.id}`);
          this.manga = response.data;
        } catch (error) {
          console.error('Errore nel recupero del manga:', error);
        }
      },
    },
  };
  </script>

  <style scoped>
  /* Aggiungi gli stili necessari */
  </style>
