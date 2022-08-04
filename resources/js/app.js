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
let map;

function initMap() {
    map = new google.maps.Map(document.getElementById("map"), {
        center: { lat: 31.560951649067082, lng: -7.65937043446012 },
        zoom: 20,
    });
    const contentString =
        '<div id="content">' +
        '<div id="siteNotice">' +
        "</div>" +
        '<h1 id="firstHeading" class="firstHeading">Uluru</h1>' +
        '<div id="bodyContent">' +
        "<p><b>Uluru</b>, also referred to as <b>Ayers Rock</b>, is a large " +
        "(last visited June 22, 2009).</p>" +
        "</div>" +
        "</div>";
    const infowindow = new google.maps.InfoWindow({
        content: contentString,
    });
    const beachMarker = new google.maps.Marker({
        position: { lat: 31.56395583978245, lng: -7.664375884360373},
        map,
        icon: "https://res.cloudinary.com/dy6vgsgr8/image/upload/v1659616403/Group_1_1_vpmh6t.png",
        label: {
            text: "Trash Problem",
            className : 'grayProblem',
            color: 'green'
        }
    });
    beachMarker.addListener("click", () => {
        infowindow.open({
            anchor: beachMarker,
            map,
            shouldFocus: false,
        });
    });

}


window.initMap = initMap;
