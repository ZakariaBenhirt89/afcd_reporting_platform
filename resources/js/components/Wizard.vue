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
        <div  class="sm:w-2/4 sm:mx-auto mt-2" v-if="show">
            <RadioGroup v-model="selected">
                <RadioGroupLabel class="sr-only">  </RadioGroupLabel>
                <div class="space-y-4">
                    <RadioGroupOption   as="template" v-for="item in items" :key="item.id" :value="item.id" v-slot="{ checked, active }" @click="clickId" :id="item.id">
                        <div :class="[checked ? 'border-transparent' : 'border-gray-300', active ? 'border-green-500 ring-2 ring-green-500' : '', 'relative block bg-white border rounded-lg shadow-sm px-6 py-4 cursor-pointer sm:flex sm:justify-between focus:outline-none']" style="direction: rtl;">
                            <div class="flex items-center">
                                <div class="text-sm">
                                    <RadioGroupLabel as="p" class="font-medium text-gray-900">
                                        {{ item.title }}
                                    </RadioGroupLabel>
                                    <RadioGroupDescription as="div" class="text-gray-500">
                                    </RadioGroupDescription>
                                </div>
                            </div>
                            <RadioGroupDescription as="div" class="mt-2 flex text-sm sm:mt-0 sm:block sm:ml-4 sm:text-right">
                                <div class="font-medium text-gray-900">
                                    <img class="inline-block h-10 w-10 rounded-full mx-5" :src="item.icon" alt="" />
                                </div>
                            </RadioGroupDescription>
                            <div :class="[active ? 'border' : 'border-2', checked ? 'border-green-500' : 'border-transparent', 'absolute -inset-px rounded-lg pointer-events-none']" aria-hidden="true" />
                        </div>
                    </RadioGroupOption>
                </div>
            </RadioGroup>
            <div class="flex justify-end my-10">
                <button v-if="currentId != 0" @click="step1 = false; step2= true ; steps[0].status = 'complete'; steps[1].status = 'current'" type="button" class="mx-2 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-green-700 bg-green-100 hover:bg-green-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500" >التالي</button>
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
           <button @click="step1 = true; step2= false ; steps[0].status = 'complete'; steps[1].status = 'upcoming'" type="button" class="mx-2 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-green-700 bg-green-100 hover:bg-green-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">السابق</button>
           <button v-if="arr.length != 0" @click="step2 = false; step3= true ; steps[1].status = 'complete'; steps[2].status = 'current'" type="button" class="mx-2 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-green-700 bg-green-100 hover:bg-green-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">التالي</button>
       </div>

    </div>
    <div v-if="step3" class="flex flex-col h-fit">
        <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
            <div>
                <div>
                    <h3 class="text-lg leading-6 font-medium text-gray-900 mx-5" style="direction: rtl">صورة المشكل</h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500" style="direction: rtl">قم بتحميل صورة تعبر عن مشكل</p>
                </div>

                <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                    <div class="sm:border-t sm:border-gray-200 sm:pt-5">
                        <file-pond
                            name="current"
                            ref="pond"
                            class-name="my-pond mx-4"
                            label-idle="Drop files here..."
                            accepted-file-types="image/jpeg, image/png"
                        />
                </div>
            </div>
            </div>
        </div>
        <div  class="flex justify-between my-5">
            <button @click="step3 = false; step2= true ; steps[2].status = 'upcoming'; steps[1].status = 'current'" type="button" class="mx-2 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-green-700 bg-green-100 hover:bg-green-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">سابق</button>
            <button v-if="path != ''"  @click="step3 = false; step4= true; steps[2].status = 'complete'; steps[3].status = 'current'" type="button" class=" mx-2 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-green-700 bg-green-100 hover:bg-green-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">التالي</button>
        </div>

    </div>
    <div v-if="step4" class="flex flex-col h-fit">
        <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
            <div>
                <div>
                </div>
                <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                    <!-- This example requires Tailwind CSS v2.0+ -->
                    <RadioGroup v-if="auth" v-model="selected">
                        <RadioGroupLabel class="sr-only"> </RadioGroupLabel>
                        <div class="space-y-4">
                            <RadioGroupOption @click="handleClick"  as="template" v-for="plan in plans" :key="plan.name" :value="plan.price" v-slot="{ checked, active }" :id="plan.price">
                                <div :class="[checked ? 'border-transparent' : 'border-gray-300', active ? 'border-green-500 ring-2 ring-green-500' : '', 'relative block bg-white border rounded-lg shadow-sm px-6 py-4 cursor-pointer sm:flex sm:justify-between focus:outline-none']" style="direction: rtl;">
                                    <div class="flex items-center">
                                        <div class="text-sm">
                                            <RadioGroupLabel as="p" class="font-medium text-gray-900">
                                                {{ plan.name }}
                                            </RadioGroupLabel>
                                            <RadioGroupDescription as="div" class="text-gray-500">
                                                <p class="sm:inline">{{ plan.disk }}</p>
                                            </RadioGroupDescription>
                                        </div>
                                    </div>
                                    <RadioGroupDescription as="div" class="mt-2 flex text-sm sm:mt-0 sm:block sm:ml-4 sm:text-right">
                                        <div class="font-medium text-gray-900">{{ plan.price }}</div>
                                    </RadioGroupDescription>
                                    <div :class="[active ? 'border' : 'border-2', checked ? 'border-green-500' : 'border-transparent', 'absolute -inset-px rounded-lg pointer-events-none']" aria-hidden="true" />
                                </div>
                            </RadioGroupOption>
                        </div>
                    </RadioGroup>
                    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
                        <div v-if="showAuth" class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
                    <form  class="space-y-6" >
                        <div>
                            <label style="direction: rtl" for="email" class="block text-sm font-medium text-gray-700"> Email address </label>
                            <div class="mt-1">
                                <input @change="email = $event.target.value" style="direction: rtl" id="email" name="email" type="email" autocomplete="email" required="" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm" />
                            </div>
                        </div>

                        <div>
                            <label style="direction: rtl" for="password" class="block text-sm font-medium text-gray-700"> Password </label>
                            <div class="mt-1">
                                <input @change="password = $event.target.value" style="direction: rtl" id="password" name="password" type="password" autocomplete="current-password" required="" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm" />
                            </div>
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center">

                            </div>

                            <div class="text-sm">
                            </div>
                        </div>

                        <div>
                            <button @click="testUser" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">تأكيد</button>
                        </div>
                    </form>
                </div>
                        <div v-if="register" class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
                            <form  class="space-y-6" action="#" method="POST">
                                <div>
                                    <label style="direction: rtl" for="email" class="block text-sm font-medium text-gray-700"> بريد الالكتروني </label>
                                    <div class="mt-1">
                                        <input @change="email = $event.target.value" style="direction: rtl" id="email" name="email" type="email" autocomplete="email" required="" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm" />
                                    </div>
                                </div>
                                <div>
                                    <label style="direction: rtl" for="email" class="block text-sm font-medium text-gray-700"> أسم </label>
                                    <div class="mt-1">
                                        <input @change="name = $event.target.value" style="direction: rtl" id="name" name="email" type="email" autocomplete="email" required="" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm" />
                                    </div>
                                </div>

                                <div>
                                    <label style="direction: rtl" for="password" class="block text-sm font-medium text-gray-700"> كلمة المرور </label>
                                    <div class="mt-1">
                                        <input @change="password = $event.target.value" style="direction: rtl" id="password" name="password" type="password" autocomplete="current-password" required="" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm" />
                                    </div>
                                </div>
                                <div>
                                    <label style="direction: rtl" for="password" class="block text-sm font-medium text-gray-700"> كلمة المرور </label>
                                    <div class="mt-1">
                                        <input @change="password = $event.target.value" style="direction: rtl" id="password" name="password" type="password" autocomplete="current-password" required="" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm" />
                                    </div>
                                </div>

                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">

                                    </div>

                                    <div class="text-sm">
                                    </div>
                                </div>

                                <div>
                                    <button @click="createUser" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">تأكيد</button>
                                </div>
                            </form>
                        </div>
                       <div v-if="done1" class="flex justify-center">
                           <lottie-player src="https://assets8.lottiefiles.com/datafiles/Wv6eeBslW1APprw/data.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"    autoplay></lottie-player>
                       </div>
                    </div>
                </div>
            </div>
        </div>
        <div  class="flex justify-between my-5">
            <button @click="step4 = false; step3= true ; steps[3].status = 'upcoming'; steps[2].status = 'current'" type="button" class="mx-2 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-green-700 bg-green-100 hover:bg-green-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">سابق</button>
            <button v-if="isUser" @click="sendReport" type="button" class=" mx-2 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-green-700 bg-green-100 hover:bg-green-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">ارسال</button>
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
import { RadioGroup, RadioGroupDescription, RadioGroupLabel, RadioGroupOption } from '@headlessui/vue'

// Import plugins
import FilePondPluginFileValidateType from 'filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.esm.js';
import FilePondPluginImagePreview from 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.esm.js';
import FilePondPluginImageValidateSize from 'filepond-plugin-image-validate-size';


// Import styles
import 'filepond/dist/filepond.min.css';
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css';



const steps = [
    { id: '01', name: 'فئة المشكل', href: '#', status: 'current' },
    { id: '02', name: 'تحديد الموقع', href: '#', status: 'upcoming' },
    { id: '03', name: 'تحميل الصورة', href: '#', status: 'upcoming' },
    { id: '04', name: 'قبل الإرسال', href: '#', status: 'upcoming' },
]
const plans = [
    { name: 'لدي حساب', ram: '8GB', cpus: '4 CPUs', disk: 'في حالة توفر على حساب مفعل أو انشاء حساب للتبع تبليغ', price: '1' },
    { name: 'انشاء حساب', ram: '8GB', cpus: '4 CPUs', disk: 'في حالة عدم توفر على حساب مفعل أو انشاء حساب للتبع تبليغ', price: '2' },
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
        RadioGroup,
        RadioGroupDescription,
        RadioGroupLabel,
        RadioGroupOption,
    },
    setup() {
        const step1 = ref(true)
        const step2 = ref(false)
        const step3 = ref(false)
        const step4 = ref(false)
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
        const showBtn = ref(true)
        const selected = ref('')
        const auth = ref(true)
        const showAuth = ref(false)
        const register = ref(false)
        const email = ref('')
        const name = ref('')
        const password = ref('')
        const isUser = ref(false)
        const done1 = ref(false)
        const userId = ref('')

        return {
            steps,
            step1,
            step2,
            step3,
            step4,
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
            error,
            showBtn,
            plans,
            selected,
            auth,
            showAuth,
            register,
            email,
            name,
            password,
            isUser,
            done1,
            userId,
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
            this.showBtn = false
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
                       setTimeout(function () {
                           window.location.href = window.origin + '/dashboard'
                       } , 2500)
                    }
                }).catch((err) => {
                    this.error = true
                })
            }
        },
        handleClick(e){
            e.preventDefault()
            console.log("clicked the option ", this.selected)
            this.showAuth = (this.selected == '1');
            this.register = (this.selected == '2');
            this.auth = false
        },
        testUser(e){
            e.preventDefault()
            const token = document.querySelector("[name='csrf-token']").getAttribute("content")
            if (token !== null){
                axios.defaults.headers.common['X-CSRF-TOKEN'] = token
                axios.post('/check/user' , {
                    "login" : this.email ,
                    "password" : this.password

                }).then((res) => {
                    console.log(res)
                    if(res.status === 200){
                        this.showAuth = false
                        this.isUser = true
                        this.done1 = true
                        this.userId = res['data'].id
                    }
                }).catch((err) => {
                    this.isUser = false
                    console.log(err)
                })
            }
        },
        createUser(e){
            e.preventDefault()
            const token = document.querySelector("[name='csrf-token']").getAttribute("content")
            if (token !== null){
                axios.defaults.headers.common['X-CSRF-TOKEN'] = token
                axios.post('/create/user' , {
                     "email" : this.email ,
                     "name": this.name,
                     "password" : this.password,
                     "password_confirmation": this.password,
                }).then((res) => {
                    console.log(res)
                    if(res.status === 200){
                        this.register = false
                        this.isUser = true
                        this.done1 = true
                        this.userId = res['data'].id
                    }
                }).catch((err) => {
                    this.isUser = false
                    this.done1 = false
                    console.log(err)
                })
            }
        },
        check1(){
            return this.currentId != 0
        },
        check2(){
          return this.arr.length != 0
        },
        check3(){
          return this.path != ''
        },
        check4(){
          this.isUser
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
