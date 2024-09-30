<template>
    <div>
      <h2>Commenti</h2>
      <div v-if="comments.length">
        <div v-for="comment in comments" :key="comment.id">
          <p><strong>{{ comment.user.name }}</strong>: {{ comment.content }}</p>
        </div>
      </div>
      <div v-else>
        <p>Nessun commento disponibile.</p>
      </div>
      <div v-if="isAuthenticated">
        <textarea v-model="newComment" placeholder="Scrivi un commento..."></textarea>
        <button @click="postComment">Invia</button>
      </div>
      <div v-else>
        <p><router-link to="/login">Accedi</router-link> per lasciare un commento.</p>
      </div>
    </div>
  </template>

  <script>
  import axios from 'axios';

  export default {
    name: 'Comments',
    props: {
      mangaId: {
        type: Number,
        default: null,
      },
      volumeId: {
        type: Number,
        default: null,
      },
    },
    data() {
      return {
        comments: [],
        newComment: '',
        isAuthenticated: false,
      };
    },
    created() {
      this.getComments();
      this.isAuthenticated = !!document.querySelector('meta[name="user-id"]');
    },
    methods: {
      async getComments() {
        try {
          const response = await axios.get('/api/comments', {
            params: {
              manga_id: this.mangaId,
              volume_id: this.volumeId,
            },
          });
          this.comments = response.data;
        } catch (error) {
          console.error('Errore nel recupero dei commenti:', error);
        }
      },
      async postComment() {
        try {
          await axios.post('/api/comments', {
            content: this.newComment,
            manga_id: this.mangaId,
            volume_id: this.volumeId,
          });
          this.newComment = '';
          this.getComments();
        } catch (error) {
          console.error('Errore nell\'invio del commento:', error);
        }
      },
    },
  };
  </script>

  <style scoped>
  /* Aggiungi gli stili necessari */
  </style>
