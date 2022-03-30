require('./bootstrap');

import Alpine from 'alpinejs';
import { createApp } from 'vue'
import Landing from "./components/Landing";
import Login from "./components/Login";

window.Alpine = Alpine;

Alpine.start();
createApp(Landing).mount('#app')
createApp(Login).mount('#login')
