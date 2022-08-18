<!-- This example requires Tailwind CSS v2.0+ -->
<template>
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-xl font-semibold text-gray-900">Users</h1>
                <p class="mt-2 text-sm text-gray-700">A list of all the users in your account including their name, title, email and role.</p>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
            </div>
        </div>
        <div class="mt-8 flex flex-col">
            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-green-50">
                            <tr>
                                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Name</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Date</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Email</th>
                                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                            <tr v-for="person in people" :key="person.email">
                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ person.name }}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{person.created_at}}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ person.email }}</td>
                                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                    <a href="#" :class="isConnected(person.isOnline)"
                                    >{{person.isOnline === 0 ? 'deconnected' : 'connected'}}<span class="sr-only"></span></a
                                    >
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import {ref} from 'vue'
import Pusher from "pusher-js";



export default {
    name: 'Declarations',
    setup() {
        const people = ref([])


        return {
            people,
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
        },
        isConnected(data){
          if(data != 0){
              return 'text-green-600 hover:text-green-900'
          }else {
              return 'text-red-600 hover:text-red-900'
          }
        }
    },
    mounted() {
        this.fetchUsers()
        let pusher = new Pusher(
            "31ab671a12f47aa12622",{
                cluster: 'eu'
            });
        // console.log(process.env.PUSHER_APP_ID)
        let channel = pusher.subscribe('nice-channel');
        channel.bind("loged-user" ,  () =>{
            this.fetchUsers()
        })
        channel.bind("logout-user" ,  () => {
            this.fetchUsers()
        })
    }
}
</script>
