import './bootstrap';
import { createApp } from 'vue';
import App from './App.vue';
import router from './router';

const app = createApp({});

import ExampleComponent from './components/ExampleComponent.vue';
app.component('example-component', ExampleComponent);

createApp(App).use(router).mount('#app');
app.mount('#app');
