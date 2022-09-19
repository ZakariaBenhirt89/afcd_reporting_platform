<!-- This example requires Tailwind CSS v2.0+ -->
<template>
    <div class="px-4 sm:px-6 lg:px-8 py-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-xl font-semibold text-gray-900" style="direction: rtl">مشاكل مبلغ عنها</h1>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
            </div>
        </div>
        <div class="mt-8 flex flex-col">
            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-green-50" style="direction: rtl">
                            <tr>

                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">تاريخ</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">الحالة</th>
                                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6 ">
                                    تعليق
                                </th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                            <tr v-for="(person, index) in people" :key="person.id">
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ person.created_at}}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    <span :class="[getColor(person.state) , 'inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium']"> {{person.state}} </span>
                                </td>
                                <td class="sm:relative sm:whitespace-nowrap sm:py-4 sm:pl-3 sm:pr-4 sm:text-right sm:text-sm sm:font-medium sm:pr-6 hidden">

                                    <span  class="text-green-600 hover:text-green-900"
                                    >{{person['description-report']}}</span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <TransitionRoot as="template" :show="open">
        <Dialog as="div" class="fixed z-10 inset-0 overflow-y-auto" @close="() => {}">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in duration-200" leave-from="opacity-100" leave-to="opacity-0">
                    <DialogOverlay class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" />
                </TransitionChild>

                <!-- This element is to trick the browser into centering the modal contents. -->
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" enter-to="opacity-100 translate-y-0 sm:scale-100" leave="ease-in duration-200" leave-from="opacity-100 translate-y-0 sm:scale-100" leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                    <div class="relative inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:p-6" style="width: 60vw">
                        <div>
                            <preview admin="false" :id="id" />
                        </div>
                        <div class="mt-2">
                            <button type="button" class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:text-sm" @click="handleClose" style="text-align: right">ارجع إلى لوحة القيادة</button>
                        </div>
                    </div>
                </TransitionChild>
            </div>
        </Dialog>
    </TransitionRoot>
    <updated v-if="showNot"/>
</template>

<script>
import axios from "axios";
import {ref} from 'vue';
import Modal from "./Modal";
import Preview from './Preview'
import { Dialog, DialogOverlay, DialogTitle, TransitionChild, TransitionRoot } from '@headlessui/vue'
import { CheckIcon } from '@heroicons/vue/outline'
import Pusher from 'pusher-js';
import Updated from "./Updated";



export default {
    name: 'MyIssues',
    components:{
        Modal,
        Preview,
        Dialog,
        DialogOverlay,
        DialogTitle,
        TransitionChild,
        TransitionRoot,
        CheckIcon,
        Updated,
    },
    setup() {
        let people = ref([])
        const open = ref(false)
        //31.56395583978245, lng: -7.664375884360373
        const lat = ref(31.56395583978245)
        const lng = ref(-7.664375884360373)
        const id = ref(1)
        let showNot = ref(false)

        return {
            people,
            open,
            lat,
            lng,
            id,
            showNot,
        }
    },
    methods: {
        fetchUsers : function () {
            const token = document.querySelector("[name='csrf-token']").getAttribute("content")
            if (token !== null){
                axios.defaults.headers.common['X-CSRF-TOKEN'] = token
                axios.get('/get/users').then((res) => {
                    console.log(res)
                    this.people = res.data
                })
            }
        } ,
        fetchData: function () {
            const token = document.querySelector("[name='csrf-token']").getAttribute("content")
            if (token !== null){
                axios.defaults.headers.common['X-CSRF-TOKEN'] = token
                axios.get('/user/issue').then((res) => {
                    console.log(res)
                    this.people = res.data
                })
            }
        } ,
        getColor: function (name) {
            //"review" , "proved" , "resolved" , "rejected"
            switch (name) {
                case 'pending':
                    return 'bg-red-100 text-red-800'
                case 'review':
                    return 'bg-indigo-100 text-indigo-800'
                case 'proved':
                    return 'bg-green-100 text-green-800'
                case 'resolved':
                    return 'bg-blue-100 text-blue-800'
                case 'rejected':
                    return  'bg-gray-100 text-gray-800'
                default:
                    return  'bg-green-100 text-green-800'
            }
        },
        handleOpen: function (e) {
            this.id = e.target.id
            this.open = true
        },
        handleClose: function(){
            document.getElementById("map").innerHTML = ''
            this.open = false
        },
        subscribe: function(){
            let pusher = new Pusher(
                "31ab671a12f47aa12622",{
                    cluster: 'eu'
                });
            let channel = pusher.subscribe('nice-channel');
            channel.bind("update-report" ,  (data) => {
                this.showNot = true
                console.log("updated")
                this.fetchData()
                setTimeout( () => {
                    //location.reload()
                    this.showNot = false
                } , 7500)

            })
        }
    }
    ,
    mounted() {
        // this.fetchUsers()
        this.fetchData()
        this.subscribe()
    }
}
</script>
