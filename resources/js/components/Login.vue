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
                <img class="h-14 w-auto" src="https://res.cloudinary.com/dy6vgsgr8/image/upload/v1659017596/eco_logo_b51rqq.png" alt="Workflow" />
                <div>
                    <h2 style="direction: rtl" class="mt-6 text-3xl font-extrabold text-gray-900">
                        تسجيل الدخول للحساب
                    </h2>
                </div>

                <div class="mt-8">
                    <div class="mt-6">
                        <form action="#" method="POST" class="space-y-6">
                            <div>
                                <label style="direction: rtl" for="email" class="block text-sm font-medium text-gray-700">
                                    بريد الالكتروني
                                </label>
                                <div class="mt-1">
                                    <input style="direction: rtl" id="email" name="email" type="email" autocomplete="email" required="" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm" v-model="username" />
                                </div>
                            </div>

                            <div class="space-y-1">
                                <label style="direction: rtl" for="password" class="block text-sm font-medium text-gray-700">
                                    كلمة المرور
                                </label>
                                <div class="mt-1">
                                    <input style="direction: rtl" id="password" name="password" type="password" autocomplete="current-password" required="" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm" v-model="password" />
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
                                    <svg v-show="state" aria-hidden="true" class="mr-2 w-5 h-5 text-gray-200 animate-spin dark:text-gray-600 fill-stone-50" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                                    </svg>
                                    تسجيل الدخول
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
    </div>
</template>
<script>
import Copyright from './Modal'
import axios from 'axios'
import {ref} from 'vue'

export default {
    components: {
      Copyright
    },
    setup(){
        const username= ref("")
        const password = ref("")
        const state = ref(false)
   return {
       username ,
       password,
       state
   }
    },
 methods : {
     login(e) {
     e.preventDefault()
         this.state = true
         const token = document.querySelector("[name='csrf-token']").getAttribute("content")
         if (token !== null){
             axios.defaults.headers.common['X-CSRF-TOKEN'] = token
             axios.post('/login' , {
                 "login" : this.username ,
                 "password" : this.password

             }).then((res) => {
                 this.state = false
                 console.log(res)
                 if(res.status === 200){
                     window.location.href = window.location.origin + '/dashboard'
                 }
             }).catch((err) => {
                 this.state = false
                 console.log(err)
             })
         }
     }
 }
}
</script>
