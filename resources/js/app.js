require('./bootstrap');

import Alpine from 'alpinejs';
import { createApp } from 'vue'
import {createRouter , createWebHistory} from 'vue-router'
import Pusher from 'pusher-js';
import Landing from "./components/Landing";
import Login from "./components/Login";
import Editor from "./components/Editor";
import Landingone from "./components/Landingone";
import Copyrigth from './components/Modal'
import Loginphone from "./components/Loginphone";
import Welcome from "./components/Welcome";
import Report from './components/Wizard'
import Notification from "./components/Notification"
import Declarations from './components/Reports'
import Issues from "./components/Issues";
import Preview from "./components/Preview";
import Resource from './components/Resources'
import Map from './components/Map'
import MyIssues from "./components/MyIssues";
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
createApp(Loginphone).mount('#phone')
createApp(Welcome).mount('#welcome')
createApp(Report).mount('#map1')
createApp(Notification).mount('#noti')
createApp(Notification).mount('#noti2')
createApp(Declarations).mount('#report')
createApp(Issues).mount('#issues')
createApp(Map).mount('#map')
createApp(Map).mount('#map3')
createApp(Resource).mount('#resources')
createApp(MyIssues).mount('#myiss')

// let pusher = new Pusher(
//     "31ab671a12f47aa12622",{
//         cluster: 'eu'
//     });
// console.log(process.env.PUSHER_APP_ID)
// let channel = pusher.subscribe('nice-channel');
// channel.bind("loged-user" , function (data) {
//     console.log("the data")
// })
let map;
let map1;

function initMap(lat , lng) {
    console.log(lat , '********' , lng)
    const directionsService = new google.maps.DirectionsService();
    const directionsRenderer = new google.maps.DirectionsRenderer();
    map = new google.maps.Map(document.getElementById("map"), {
        center: { lat: 31.56395583978245, lng: -7.664375884360373},
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
    directionsRenderer.setMap(map);
    directionsService.route({
            origin: new google.maps.LatLng(31.56479673466521, -7.663478910112956),
    destination: new google.maps.LatLng(lat , lng),
    travelMode: google.maps.TravelMode.DRIVING,
}).then((response) => {
        directionsRenderer.setDirections(response);
    }).catch((e) => window.alert("Directions request failed due to " + status));

}
function showMap(){
    map1 = new google.maps.Map(document.getElementById("map"), {
        center: { lat: 31.56395583978245, lng: -7.664375884360373},
        zoom: 20,
    });
    const beachMarker = new google.maps.Marker({
        position: { lat: 31.56395583978245, lng: -7.664375884360373},
        map1,
        icon: "https://res.cloudinary.com/dy6vgsgr8/image/upload/v1659616403/Group_1_1_vpmh6t.png",
        label: {
            text: "Trash Problem",
            className : 'grayProblem',
            color: 'green'
        }
    });
}
if ( window.location.pathname === '/issues' || window.location.pathname === '/myissue'  ){
    window.initMap = initMap
}
if (window.location.pathname === '/declarations' ){
    window.showMap = showMap
}

google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);
const weekday = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
const currentDay = (new Date()).getDay()
function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['days', 'Reports frequency'],
        [`${weekday[currentDay - 6 < 0 ? 7+ currentDay - 6 : currentDay - 6]}`,  1000      ],
        [`${weekday[currentDay - 5 < 0 ? 7 + currentDay - 5  : currentDay - 5]}`,  1170      ],
        [`${weekday[currentDay - 4 < 0 ? 7 + currentDay - 4  : currentDay - 4]}`,  660     ],
        [`${weekday[currentDay - 3 < 0 ? 7 + currentDay - 3 : currentDay - 3]}`,  1030      ],
        [`${weekday[currentDay - 2 < 0 ? 7  + currentDay - 2 : currentDay - 2]}`,  2000      ],
        [`${weekday[currentDay - 1 < 0 ? 7 + currentDay - 1 : currentDay - 1]}`,  2014      ],
        [`${weekday[currentDay]}`,  1754      ],
    ]);

    var options = {
        title: 'Company Performance',
        curveType: 'function',
        legend: { position: 'bottom' }
    };

    var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

    chart.draw(data, options);
}
