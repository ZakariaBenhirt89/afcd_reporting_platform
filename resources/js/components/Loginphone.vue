<!--
  This example requires Tailwind CSS v2.0+

  This example requires some changes to your config:

  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
<template>
    <div class="min-h-screen bg-white flex">
        <div class="flex-1 flex flex-col justify-center py-12 px-4 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
            <div class="mx-auto w-full max-w-sm lg:w-96">
                <div>
                    <img class="h-14 w-auto" src="https://res.cloudinary.com/dy6vgsgr8/image/upload/v1659017596/eco_logo_b51rqq.png" alt="Workflow" />
                    <h2 class="mt-6 text-3xl font-extrabold text-gray-900">
                        Sign in to your account
                    </h2>
                </div>

                <div class="mt-8">
                    <div class="mt-6">
                        <form action="#" method="POST" class="space-y-6">
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">
                                    Phone
                                </label>
                                <div class="mt-1">
                                    <input id="email" name="email" type="email" autocomplete="email" required="" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm" v-model="username" />
                                </div>
                            </div>

                            <div class="space-y-1">
                                <label for="password" class="block text-sm font-medium text-gray-700">
                                    Password
                                </label>
                                <div class="mt-1">
                                    <input id="password" name="password" type="password" autocomplete="current-password" required="" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm" v-model="password" />
                                </div>
                            </div>

                            <div class="flex items-center justify-between">
                                <div class="flex items-center">

                                </div>

                                <div class="text-sm">

                                </div>
                            </div>

                            <div>
                                <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-500 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500" @click="login">
                                    Sign in
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="hidden lg:block relative w-0 flex-1">
            <img class="absolute inset-0 h-full w-full object-cover" src="https://images.unsplash.com/photo-1505904267569-f02eaeb45a4c?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1908&q=80" alt="" />
        </div>
        <!-- This example requires Tailwind CSS v2.0+ -->
    </div>
    <div id="modal"  class="fixed z-10 inset-0 overflow-y-auto bg-indigo-50 w-25 h-35" ></div>
</template>
<script>
import axios from 'axios'
import {ref} from 'vue'


export default {
    components: {

    },
    setup(){
        const username= ref("")
        const password = ref("")
        const open = ref(true)

        return {
            username ,
            password,
            open
        }
    },
    methods : {
        login(e) {
            e.preventDefault()
            const token = document.querySelector("[name='csrf-token']").getAttribute("content")
            console.table({
                "email" : this.username ,
                "password" : this.password
            })
            if (token !== null){
                axios.defaults.headers.common['X-CSRF-TOKEN'] = token
                axios.post('/login' , {
                    "login" : this.username ,
                    "password" : this.password
                }).then((res) => {
                    console.log(res)
                    if(res.status === 200){
                        window.location.href = window.location.origin + '/dashboard'
                    }
                })
            }
        }
    }
}
</script>
