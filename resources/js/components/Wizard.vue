<!-- This example requires Tailwind CSS v2.0+ -->
<template>
    <nav aria-label="Progress">
        <ol role="list" class="border border-gray-300 rounded-md divide-y divide-gray-300 md:flex md:divide-y-0">
            <li v-for="(step, stepIdx) in steps" :key="step.name" class="relative md:flex-1 md:flex">
                <a v-if="step.status === 'complete'" :href="step.href" class="group flex items-center w-full">
          <span class="px-6 py-4 flex items-center text-sm font-medium">
            <span class="flex-shrink-0 w-10 h-10 flex items-center justify-center bg-green-600 rounded-full group-hover:bg-green-800">
              <CheckIcon class="w-6 h-6 text-white" aria-hidden="true" />
            </span>
            <span class="ml-4 text-sm font-medium text-gray-900">{{ step.name }}</span>
          </span>
                </a>
                <a v-else-if="step.status === 'current'" :href="step.href" class="px-6 py-4 flex items-center text-sm font-medium" aria-current="step">
          <span class="flex-shrink-0 w-10 h-10 flex items-center justify-center border-2 border-green-600 rounded-full">
            <span class="text-green-600">{{ step.id }}</span>
          </span>
                    <span class="ml-4 text-sm font-medium text-green-600">{{ step.name }}</span>
                </a>
                <a v-else :href="step.href" class="group flex items-center">
          <span class="px-6 py-4 flex items-center text-sm font-medium">
            <span class="flex-shrink-0 w-10 h-10 flex items-center justify-center border-2 border-gray-300 rounded-full group-hover:border-gray-400">
              <span class="text-gray-500 group-hover:text-gray-900">{{ step.id }}</span>
            </span>
            <span class="ml-4 text-sm font-medium text-gray-500 group-hover:text-gray-900">{{ step.name }}</span>
          </span>
                </a>
                <template v-if="stepIdx !== steps.length - 1">
                    <!-- Arrow separator for lg screens and up -->
                    <div class="hidden md:block absolute top-0 right-0 h-full w-5" aria-hidden="true">
                        <svg class="h-full w-full text-gray-300" viewBox="0 0 22 80" fill="none" preserveAspectRatio="none">
                            <path d="M0 -2L20 40L0 82" vector-effect="non-scaling-stroke" stroke="currentcolor" stroke-linejoin="round" />
                        </svg>
                    </div>
                </template>
            </li>
        </ol>
    </nav>
    <div v-if="step1" class="h-fit">
        <div class="animate-pulse flex space-x-4 mx-5 my-10" v-if="!show">
            <div class="rounded-full bg-slate-700 h-10 w-10"></div>
            <div class="flex-1 space-y-6 py-1">
                <div class="h-2 bg-slate-700 rounded"></div>
                <div class="space-y-3">
                    <div class="grid grid-cols-3 gap-4">
                        <div class="h-2 bg-slate-700 rounded col-span-2"></div>
                        <div class="h-2 bg-slate-700 rounded col-span-1"></div>
                    </div>
                    <div class="h-2 bg-slate-700 rounded"></div>
                </div>
            </div>
        </div>
        <div class="animate-pulse flex space-x-4 mx-5 my-10" v-if="!show">
            <div class="rounded-full bg-slate-700 h-10 w-10"></div>
            <div class="flex-1 space-y-6 py-1">
                <div class="h-2 bg-slate-700 rounded"></div>
                <div class="space-y-3">
                    <div class="grid grid-cols-3 gap-4">
                        <div class="h-2 bg-slate-700 rounded col-span-2"></div>
                        <div class="h-2 bg-slate-700 rounded col-span-1"></div>
                    </div>
                    <div class="h-2 bg-slate-700 rounded"></div>
                </div>
            </div>
        </div>
        <div class="animate-pulse flex space-x-4 mx-5 my-10" v-if="!show">
            <div class="rounded-full bg-slate-700 h-10 w-10"></div>
            <div class="flex-1 space-y-6 py-1">
                <div class="h-2 bg-slate-700 rounded"></div>
                <div class="space-y-3">
                    <div class="grid grid-cols-3 gap-4">
                        <div class="h-2 bg-slate-700 rounded col-span-2"></div>
                        <div class="h-2 bg-slate-700 rounded col-span-1"></div>
                    </div>
                    <div class="h-2 bg-slate-700 rounded"></div>
                </div>
            </div>
        </div>
        <div  style="margin: auto; width:50%" v-if="show">
            <ul role="list" class="divide-y divide-gray-200 w-30">
                <li :ref="currentId" v-for="item in items" :key="item.id" :id="item.id" :class="[currentId == item.id ? 'bg-green-600' : '', 'w-30 flex py-4 hover:bg-green-400 active:bg-green-700 ocus:outline-none focus:ring focus:ring-green-300']" @click="clickId">
                    <img class="inline-block h-10 w-10 rounded-full mx-5" :src="item.icon" alt="" />
                    <p> {{item.title}}</p>
                </li>
            </ul>
            <div class="flex justify-end my-10">
                <button v-if="show" @click="step1 = false; step2= true ; steps[0].status = 'complete'; steps[1].status = 'current'" type="button" class="mx-2 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-green-700 bg-green-100 hover:bg-green-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500" >Next</button>
            </div>
        </div>
    </div>
    <div v-if="step2" class="h-fit">
        <GoogleMap @click="currentLocation" api-key="AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg" style="width: 100%; height: 60vh" :center="center" :zoom="15">
           <MarkerCluster>
               <Marker v-for="a in arr" :options="{ position: a, label: 'L', title: 'LADY LIBERTY'  }" />
           </MarkerCluster>

        </GoogleMap>
       <div class="flex justify-between my-5">
           <button @click="step1 = true; step2= false ; steps[0].status = 'complete'; steps[1].status = 'upcoming'" type="button" class="mx-2 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-green-700 bg-green-100 hover:bg-green-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">previus</button>
           <button @click="step2 = false; step3= true ; steps[1].status = 'complete'; steps[2].status = 'current'" type="button" class="mx-2 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-green-700 bg-green-100 hover:bg-green-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">next</button>
       </div>

    </div>
    <div v-if="step3" class="flex flex-col h-fit">
        <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
            <div>
                <div>
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Issue Photo</h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">please upload a photo for the current state of the issue.</p>
                </div>

                <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                    <div class="sm:grid sm:grid-cols-2 sm:gap-3 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="cover-photo" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Cover photo </label>
                        <file-pond
                            name="current"
                            ref="pond"
                            class-name="my-pond"
                            label-idle="Drop files here..."
                            accepted-file-types="image/jpeg, image/png"
                        />
                </div>
            </div>
            </div>
        </div>
        <div  class="flex justify-between my-5">
            <button @click="step3 = false; step2= true ; steps[2].status = 'upcoming'; steps[1].status = 'current'" type="button" class="mx-2 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-green-700 bg-green-100 hover:bg-green-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">previus</button>
            <button @click="sendReport" type="button" class=" mx-2 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-green-700 bg-green-100 hover:bg-green-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">send</button>
        </div>

    </div>
    <good v-if="done"></good>
    <error v-if="error"></error>
</template>

<script>
import {ref} from 'vue'
import { CheckIcon } from '@heroicons/vue/solid'
import axios from "axios";
import Good from './Good'
import Error from './Eroor'
import { GoogleMap , Marker , MarkerCluster } from "vue3-google-map";
import vueFilePond , {setOptions} from 'vue-filepond';

// Import plugins
import FilePondPluginFileValidateType from 'filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.esm.js';
import FilePondPluginImagePreview from 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.esm.js';
import FilePondPluginImageValidateSize from 'filepond-plugin-image-validate-size';


// Import styles
import 'filepond/dist/filepond.min.css';
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css';



const steps = [
    { id: '01', name: 'Job details', href: '#', status: 'current' },
    { id: '02', name: 'Application form', href: '#', status: 'upcoming' },
    { id: '03', name: 'Preview', href: '#', status: 'upcoming' },
]

const FilePond = vueFilePond(FilePondPluginFileValidateType, FilePondPluginImagePreview , FilePondPluginImageValidateSize);

export default {
    name: 'Report',
    components: {
        Error,
        CheckIcon,
        GoogleMap,
        Marker,
        MarkerCluster,
        FilePond,
        Good,
    },
    setup() {
        const step1 = ref(true)
        const step2 = ref(false)
        const step3 = ref(false)
        const show = ref(false)
        const items = ref([])
        const currentId = ref(0)
        const center = { lat:31.56717001089404, lng:-7.653935889683484 };
        const labelPlace = ref({ })
        const currentPlace = ref({ position: center, label: "L", title: "LADY LIBERTY"  })
        const arr = ref([])
        const cond = ref(true)
        const path = ref('')
        const done = ref(false)
        const error = ref(false)
        return {
            steps,
            step1,
            step2,
            step3,
            show,
            items,
            currentId,
            center,
            currentPlace,
            labelPlace,
            arr,
            cond,
            path,
            done,
            error
        }
    },
    methods: {
        getCats: function () {
            const token = document.querySelector("[name='csrf-token']").getAttribute("content")
            if (token !== null) {
                axios.defaults.headers.common['X-CSRF-TOKEN'] = token
                axios.get('/get/cat').then((res) => {
                    if (res.status === 200) {
                        console.table(res)
                        this.items = res.data['result']
                        this.show = true
                    }
                }).catch((err) => {
                    console.log(err)
                })
            }
        },
        clickId: function (e) {
            this.currentId = e.target.id
            console.log(this.currentId)
            this.$forceUpdate()
        },
        currentLocation: function (e){
            this.arr.pop()
            if (this.arr.length === 1){
                this.arr.pop()
            }
            console.log(e.latLng.lat() , e.latLng.lng() )
            this.arr.push({lat: e.latLng.lat(), lng: e.latLng.lng()  })

        },
        sendReport(e){
            e.preventDefault()
            const token = document.querySelector("[name='csrf-token']").getAttribute("content")
            if (token !== null) {
                axios.defaults.headers.common['X-CSRF-TOKEN'] = token
                axios.post('/store/report' , {
                    "catId" : this.currentId,
                    "lat": this.arr[0].lat,
                    'lng': this.arr[0].lng,
                    "cover": this.path
                }).then((res) => {
                    if (res.status === 200) {
                      this.done = true
                    }
                }).catch((err) => {
                    this.error = true
                })
            }
        }
    },
    mounted() {
        this.getCats()
        const token = document.querySelector('[name="csrf-token"]').getAttribute("content")
        setOptions({
            server: {
                url: window.location.origin,
                timeout: 7000,
                process: {
                    url: '/upload',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': token,
                    },
                    withCredentials: false,
                    onload: (response) => {
                        console.log(response)
                        const res = JSON.parse(response);
                        this.path = res["path"]
                    },
                    onerror: (response) => response.data,
                    ondata: (formData) => {
                        formData.append('Hello', 'World');
                        return formData;
                    },
                },
            },
        });
    }
}
</script>
