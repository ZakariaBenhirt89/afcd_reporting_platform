require('./bootstrap');

import Alpine from 'alpinejs';
import { createApp } from 'vue'
import Landing from "./components/Landing";
import Login from "./components/Login";
import Editor from "./components/Editor";
import Landingone from "./components/Landingone";
window.Alpine = Alpine;

Alpine.start();
createApp(Landingone).mount('#app')
createApp(Login).mount('#login')
function f() {

}

