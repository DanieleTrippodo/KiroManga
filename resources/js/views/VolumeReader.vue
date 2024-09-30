<template>
    <div>
      <h1>Volume {{ volume.volume_number }}</h1>
      <div v-if="pages.length">
        <div v-for="page in limitedPages" :key="page.id">
          <img :src="`/storage/${page.image_path}`" :alt="`Pagina ${page.page_number}`" />
        </div>
      </div>
      <div v-else>
        <p>Nessuna pagina disponibile.</p>
      </div>
      <!-- Aggiungi la sezione per i commenti -->
      <Comments :volume-id="volume.id" />
    </div>
  </template>

  <script>
  import axios from 'axios';
  import Comments from '../components/Comments.vue';

  export default {
    name: 'VolumeReader',
    components: {
      Comments,
    },
    data() {
      return {
        volume: {},
        pages: [],
      };
    },
    created() {
        this.getVolume();
        this.isAuthenticated = !!document.querySelector('meta[name="user-id"]');
    },
    computed: {
      sortedPages() {
        return this.pages.sort((a, b) => a.page_number - b.page_number);
      },
      limitedPages() {
        if (this.isAuthenticated) {
          return this.sortedPages;
        } else {
          return this.sortedPages.slice(0, 10);
        }
      },
    },
    methods: {
      async getVolume() {
        try {
          const response = await axios.get(`/api/volumes/${this.$route.params.id}`);
          this.volume = response.data;
          this.pages = this.volume.pages;
        } catch (error) {
          console.error('Errore nel recupero del volume:', error);
        }
      },
    },
  };
  </script>

  <style scoped>
  /* Aggiungi gli stili necessari */
  </style>
