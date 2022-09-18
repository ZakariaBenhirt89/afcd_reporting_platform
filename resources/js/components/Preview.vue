<!--
  This example requires Tailwind CSS v2.0+

  This example requires some changes to your config:

  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/typography'),
    ],
  }
  ```
-->
<template>
    <div class="bg-white h-fit">
        <div class="pt-6 pb-16 sm:pb-24">
            <nav aria-label="Breadcrumb" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
               <h1 style="direction: rtl">معاينة المشكلة</h1>
            </nav>
            <div style="height: 90vh" class="mt-8 max-w-2xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8 py-8">
                <div class="lg:grid lg:grid-cols-12 lg:auto-rows-min lg:gap-x-8 py-1 ">
                    <!-- Image gallery -->
                    <div class="my-8 lg:mt-0 lg:col-start-1 lg:col-span-7 lg:row-start-1 lg:row-span-3">
                        <div id="map" style="width: 100%;height: 100%"></div>
                    </div>

                    <div class="mt-2 lg:col-span-5">


                        <!-- Product details -->
                        <div class="mt-10">
                            <h2 class="text-sm font-medium text-gray-900">Image preview</h2>
                            <img style="height: 100%;width: 100%" :src="image" alt="preview"/>
                        </div>

                        <div class="mt-8 border-t border-gray-200 pt-8" >
                            <div class="md:hidden" id="map3" style="width: 100%;height: 100%"></div>
                            <h2 class="text-sm font-medium text-gray-900" v-if="admin == 'true'">Description and state </h2>

                            <div class="mt-4 prose prose-sm text-gray-500" v-if="admin == 'true'">
                                <div class="my-4">
                                    <label for="comment" class="block text-sm font-medium text-gray-700">Add description</label>
                                    <div class="mt-1">
                                        <textarea v-model="desc" rows="4" name="comment" id="comment" class="shadow-sm focus:ring-green-500 focus:border-green-500 block w-full sm:text-sm border-gray-300 rounded-md"></textarea>
                                    </div>
                                </div>
                                <div class="my-4">
                                    <label for="location" class="block text-sm font-medium text-gray-700">update the state</label>
                                    <select v-model="state" id="location" name="location" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm rounded-md">
                                        <option></option>
                                        <option value="pending">pending</option>
                                        <option value="review">review</option>
                                        <option value="proved">proved</option>
                                        <option value="resolved">resolved</option>
                                        <option value="rejected">rejected</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Policies -->
                        <section aria-labelledby="policies-heading" class="mt-5">
                            <button @click="store" v-if="state !== '' && desc !== ''" type="button" class="w-full items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">Save</button>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { ref } from 'vue'
import { StarIcon } from '@heroicons/vue/solid'
import { RadioGroup, RadioGroupLabel, RadioGroupOption } from '@headlessui/vue'
import { CurrencyDollarIcon, GlobeIcon } from '@heroicons/vue/outline'
import { GoogleMap , Marker , MarkerCluster } from "vue3-google-map";
import Updated from "./Updated";
import axios from "axios";


const product = {
    name: 'Basic Tee',
    price: '$35',
    rating: 3.9,
    reviewCount: 512,
    href: '#',
    breadcrumbs: [
        { id: 1, name: 'Women', href: '#' },
        { id: 2, name: 'Clothing', href: '#' },
    ],
    images: [
        {
            id: 1,
            imageSrc: 'https://tailwindui.com/img/ecommerce-images/product-page-01-featured-product-shot.jpg',
            imageAlt: "Back of women's Basic Tee in black.",
            primary: true,
        },
        {
            id: 2,
            imageSrc: 'https://tailwindui.com/img/ecommerce-images/product-page-01-product-shot-01.jpg',
            imageAlt: "Side profile of women's Basic Tee in black.",
            primary: false,
        },
        {
            id: 3,
            imageSrc: 'https://tailwindui.com/img/ecommerce-images/product-page-01-product-shot-02.jpg',
            imageAlt: "Front of women's Basic Tee in black.",
            primary: false,
        },
    ],
    colors: [
        { name: 'Black', bgColor: 'bg-gray-900', selectedColor: 'ring-gray-900' },
        { name: 'Heather Grey', bgColor: 'bg-gray-400', selectedColor: 'ring-gray-400' },
    ],
    sizes: [
        { name: 'XXS', inStock: true },
        { name: 'XS', inStock: true },
        { name: 'S', inStock: true },
        { name: 'M', inStock: true },
        { name: 'L', inStock: true },
        { name: 'XL', inStock: false },
    ],
    description: `
    <p>The Basic tee is an honest new take on a classic. The tee uses super soft, pre-shrunk cotton for true comfort and a dependable fit. They are hand cut and sewn locally, with a special dye technique that gives each tee it's own look.</p>
    <p>Looking to stock your closet? The Basic tee also comes in a 3-pack or 5-pack at a bundle discount.</p>
  `,
    details: [
        'Only the best materials',
        'Ethically and locally made',
        'Pre-washed and pre-shrunk',
        'Machine wash cold with similar colors',
    ],
}
const policies = [
    { name: 'International delivery', icon: GlobeIcon, description: 'Get your order in 2 years' },
    { name: 'Loyalty rewards', icon: CurrencyDollarIcon, description: "Don't look at other tees" },
]

export default {
    name:'Preview',
    props: ['id','admin'],
    components: {
        RadioGroup,
        RadioGroupLabel,
        RadioGroupOption,
        StarIcon,
        GoogleMap,
        Marker,
        MarkerCluster,
        Updated,
    },
    setup() {
        const lat = ref('')
        const lng = ref('')
        const selectedColor = ref(product.colors[0])
        const selectedSize = ref(product.sizes[2])
        const center = { lat:31.56717001089404, lng:-7.653935889683484 };
        const labelPlace = ref({})
        const currentPlace = ref({ position: center, label: "L", title: "LADY LIBERTY"  })
        const image = ref('')
        const desc = ref("")
        const state = ref("")
        const description = ref('')
        const st = ref('')
        const showNot = ref(false)
        const showAdmin = ref(false)

        return {
            product,
            policies,
            selectedColor,
            selectedSize,
            center,
            currentPlace,
            lat,
            lng,
            image,
            desc,
            state,
            description,
            st,
            showNot,
            showAdmin
        }
    },
    mounted() {
        //lat: 31.56395583978245, lng: -7.664375884360373
        console.log(this.admin)
        this.getData()
        console.log(this.lat , this.lng)
        console.log(window.initMap)
    },
    methods: {
        startMap: function(lat , lng){
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
        },
        getData: function () {
            const id = this.id
            const token = document.querySelector("[name='csrf-token']").getAttribute("content")
            if (token !== null){
                axios.defaults.headers.common['X-CSRF-TOKEN'] = token
                axios.get('/get/map/'+id).then((res) => {
                    console.log(res)
                    this.lat = res.data.lat
                    this.lng = res.data.lng
                    console.log(res.data.lat , '********' , res.data.lng)
                    this.image = res.data.image
                    initMap(res.data.lat, res.data.lng)
                })
            }
        },
        store: function (e) {
            e.preventDefault()
            const token = document.querySelector("[name='csrf-token']").getAttribute("content")
            if (token !== null){
                axios.defaults.headers.common['X-CSRF-TOKEN'] = token
                axios.post('/store/update' , {
                    'id': this.id,
                    'description': this.desc,
                    'state': this.state,
                }).then((res) => {
                    console.log(res)
                })
            }
        }
    }
}
</script>
