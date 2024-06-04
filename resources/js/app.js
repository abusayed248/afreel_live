import './bootstrap';

import {createApp} from 'vue';

import App from './App.vue';

import Message from './components/Message.vue';

const app = createApp(App);

app.component("Message", Message); // global registration - can be used anywhere

app.mount("#app");

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
