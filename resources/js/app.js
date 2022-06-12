require('./bootstrap');

import Alpine from 'alpinejs';
import { createApp } from 'vue'
import {createRouter , createWebHistory} from 'vue-router'
import Landing from "./components/Landing";
import Login from "./components/Login";
import Editor from "./components/Editor";
import Landingone from "./components/Landingone";

window.Alpine = Alpine;

Alpine.start();
const Home = { template: '<div>Home</div>' }
const About = { template: '<div>About</div>' }

// 2. Define some routes
// Each route should map to a component.
// We'll talk about nested routes later.
const routes = [
    { path: '/home', component: Home },
    { path: '/about', component: About },
]
const router = createRouter({
    // 4. Provide the history implementation to use. We are using the hash history for simplicity here.
    history: createWebHistory(),
    routes, // short for `routes: routes`
})
console.log("the router is " , router)
router.beforeResolve((to, from, next) => {
    // If this isn't an initial page load.
    if (to.name) {
        // Start the route progress bar.
       console.log("hello mother hackers")
    }
    next()
})
createApp(Landingone).mount('#app')
createApp(Login).mount('#login')
function f() {

}

