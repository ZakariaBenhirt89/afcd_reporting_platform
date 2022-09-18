<template>
    <div class="mx-5">

        <div class=" my-5 flex md:flex-row md:items-center md:justify-between flex-col mx-5" style="height: 10vh">
            <div class="flex-1 min-w-0 flex">
                <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate mx-2" id="hello">Hello Msg</h2>
                <img id="ico" class="h-10 mx-3" src="https://res.cloudinary.com/dy6vgsgr8/image/upload/v1659609676/icons8-morning-80_lfsm4d.png" alt="hello pic"/>
            </div>
            <div class="my-4 mx-4 flex md:mt-0 ml-4" v-if="isUser != 1">
                <button type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"  @click="show1 = true; show2 = false">اضافة مشكل جديد</button>
            </div>


        </div>
        <div class="mt-8 flex flex-col mb-4" v-if="isUser != 1">
            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">فئة</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">نوع</th>
                                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                    <span class="sr-only">تحديث</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                            <tr v-for="person in cats" :key="person.id">
                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ person.title }}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ person.description }}</td>
                                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                    <a  :id="person.id" @click="changeId" class="text-indigo-600 hover:text-indigo-900"
                                    >تحديث</a
                                    >
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <stat></stat>
        <div id="curve_chart" style="width: 100%; height: 500px"></div>


        <TransitionRoot as="template" :show="show1">
            <Dialog as="div" class="fixed z-10 inset-0 overflow-y-auto" @close="show1 = false">
                <div class="flex items-end justify-center min-h-screen w-50 pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                    <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in duration-200" leave-from="opacity-100" leave-to="opacity-0">
                        <DialogOverlay class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" />
                    </TransitionChild>

                    <!-- This element is to trick the browser into centering the modal contents. -->
                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                    <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" enter-to="opacity-100 translate-y-0 sm:scale-100" leave="ease-in duration-200" leave-from="opacity-100 translate-y-0 sm:scale-100" leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                        <div class="relative inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
                            <form class="space-y-8 divide-y divide-gray-200">
                                <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                                    <div>
                                        <div>
                                            <h3 class="text-lg leading-6 font-medium text-gray-900">فئة مشكل جديد</h3>
                                        </div>

                                        <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                                            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                                <label for="username" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> اسم الفئة </label>
                                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                                    <div class="max-w-lg flex rounded-md shadow-sm">
                                                        <input @change="addTitle" type="text" name="username" id="username" autocomplete="username" class="flex-1 block w-full focus:ring-green-500 focus:border-green-500 min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                                <label for="about" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> توضيح عن الفئة  </label>
                                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                                    <textarea @change="addDesc" id="about" name="about" rows="3" class="max-w-lg shadow-sm block w-full focus:ring-green-500 focus:border-green-500 sm:text-sm border border-gray-300 rounded-md" />
                                                </div>
                                            </div>


                                            <div class="sm:grid sm:grid-cols-2 sm:gap-3 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                                <label for="cover-photo" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> صورة </label>
                                                <file-pond
                                                    name="issue"
                                                    ref="pond"
                                                    class-name="my-pond"
                                                    label-idle="Drop files here..."
                                                    accepted-file-types="image/jpeg, image/png"
                                                    image-validate-size-max-width="100"
                                                    image-validate-size-max-height="100"
                                                    v-bind:files="myFiles"
                                                    v-on:init="handleFilePondInit2"
                                                />
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="pt-5">
                                    <div class="flex justify-end">
                                        <button type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">الغاء</button>
                                        <button @click="saveIssue" type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                            <svg v-show="state" aria-hidden="true" class="mr-2 w-5 h-5 text-gray-200 animate-spin dark:text-gray-600 fill-stone-50" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                                            </svg>
                                            حفط</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </TransitionChild>
                </div>
            </Dialog>
        </TransitionRoot>
        <TransitionRoot as="template" :show="show2">
            <Dialog as="div" class="fixed z-10 inset-0 overflow-y-auto" @close="show2 = false">
                <div class="flex items-end justify-center min-h-screen w-50 pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                    <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in duration-200" leave-from="opacity-100" leave-to="opacity-0">
                        <DialogOverlay class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" />
                    </TransitionChild>

                    <!-- This element is to trick the browser into centering the modal contents. -->
                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                    <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" enter-to="opacity-100 translate-y-0 sm:scale-100" leave="ease-in duration-200" leave-from="opacity-100 translate-y-0 sm:scale-100" leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                        <div class="relative inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle  sm:w-50 sm:p-6">
                            <form class="space-y-8 divide-y divide-gray-200">
                                <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                                    <div>
                                        <div>
                                            <h3 class="text-lg leading-6 font-medium text-gray-900"> تحديث</h3>
                                        </div>

                                        <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                                            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                                <label for="username" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> اسم جديد للفئة </label>
                                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                                    <div class="max-w-lg flex rounded-md shadow-sm">
                                                        <input @change="changeSometing" type="text" name="title" id="reTitle" autocomplete="username" class="flex-1 block w-full focus:ring-green-500 focus:border-green-500 min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                                <label for="about" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> وصف للفئة </label>
                                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                                    <input @change="changeSometing" type="text" name="description" id="=resLink" autocomplete="username" class="flex-1 block w-full focus:ring-green-500 focus:border-green-500 min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300" />
                                                </div>
                                            </div>


                                            <div class="sm:grid sm:grid-cols-2 sm:gap-3 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                                <label for="cover-photo" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> صورة الفئة </label>
                                                <file-pond
                                                    name="issue"
                                                    ref="pond"
                                                    class-name="my-pond"
                                                    label-idle="Drop files here..."
                                                    accepted-file-types="image/jpeg, image/png"
                                                    v-bind:files="myFiles"
                                                    v-on:init="handleFilePondInit"
                                                />
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="pt-5">
                                    <div class="flex justify-end">
                                        <button v-if="edit"  @click="sendUpdate"  class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                            <svg  v-show="state" aria-hidden="true" class="mr-2 w-5 h-5 text-gray-200 animate-spin dark:text-gray-600 fill-stone-50" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                                            </svg>
                                            حفظ</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </TransitionChild>
                </div>
            </Dialog>
        </TransitionRoot>



    </div>
</template>
<script>
import {ref} from 'vue'
import { Dialog, DialogOverlay, DialogTitle, TransitionChild, TransitionRoot } from '@headlessui/vue'
import Loading from './Loding'
import { CheckIcon } from '@heroicons/vue/outline'
import Stat from './Stats'
// Import FilePond
import vueFilePond , {setOptions} from 'vue-filepond';

// Import plugins
import FilePondPluginFileValidateType from 'filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.esm.js';
import FilePondPluginImagePreview from 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.esm.js';
import FilePondPluginImageValidateSize from 'filepond-plugin-image-validate-size';


// Import styles
import 'filepond/dist/filepond.min.css';
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css';
import axios from "axios";
import Cats from  './Prev'
const FilePond = vueFilePond(FilePondPluginFileValidateType, FilePondPluginImagePreview , FilePondPluginImageValidateSize);
const people = [
    { name: 'Lindsay Walton', title: 'Front-end Developer', email: 'lindsay.walton@example.com', role: 'Member' },
    // More people...
]
export default {
    name: "Welcome",
    components: {
        Dialog,
        DialogOverlay,
        DialogTitle,
        TransitionChild,
        TransitionRoot,
        CheckIcon,
        FilePond,
        Loading,
        Stat,
        Cats,
    },
    setup(){
        const show1 = ref(false)
        const show2 = ref(false)
        const issueTitle = ref("")
        const issueDesc = ref("")
        const issuePath  = ref("")
        const state = ref(false)
        const resTitle = ref("")
        const resLink = ref("")
        const isUser = ref(1)
        const cats = ref([])
        const  open = ref(false)
        const id = ref(0)
        const update = new FormData()
        const edit = ref(false)
        const image2 = ref(false)


        return {
            show1,
            show2,
            issueTitle,
            issueDesc,
            issuePath,
            state,
            resTitle,
            resLink,
            isUser,
            people,
            cats,
            open,
            id,
            update,
            edit,
            image2
        }
    },
    data: function () {
        return { myFiles: [] };
    },
    methods: {
        handleFilePondInit: function () {
            console.log('FilePond has initialized');
            // example of instance method call on pond reference
            this.$refs.pond.getFiles();
            console.log(this.$refs.pond.getFiles())
        },
        handleFilePondInit2: function () {
            console.log('FilePond has initialized2');
            this.edit = true
            this.image2 = true
            // example of instance method call on pond reference
            this.$refs.pond.getFiles();
            console.log(this.$refs.pond.getFiles())
        },
        saveIssue: function (e){
            e.preventDefault()
            this.state = true
            const token = document.querySelector("[name='csrf-token']").getAttribute("content")
            if (token !== null){
                axios.defaults.headers.common['X-CSRF-TOKEN'] = token
                axios.post('/store/issue' , {
                    "issueTitle" : this.issueTitle ,
                    "issueDescription" : this.issueDesc,
                    "issuePhoto" : this.issuePath
                }).then((res) => {
                    console.log(res)
                    this.state = false
                    this.show1 = false
                })
            }
        },
        addTitle(e){
            this.issueTitle = e.target.value
        },
        addDesc(e){
            this.issueDesc = e.target.value
        },
        saveRes(e){
            e.preventDefault()
            this.state = true
            const token = document.querySelector("[name='csrf-token']").getAttribute("content")
            if (token !== null){
                axios.defaults.headers.common['X-CSRF-TOKEN'] = token
                axios.post('/store/ressource' , {
                    "resTitle" : this.resTitle ,
                    "resLink" : this.resLink,
                    "resPhoto" : this.issuePath
                }).then((res) => {
                    console.log(res)
                    this.state = false
                    this.show2 = false
                })
            }
        },
        addTitleRes(e){
            e.preventDefault()
            this.resTitle = e.target.value
        },
        addResLink(e){
            e.preventDefault()
            this.resLink = e.target.value
        },
        getUserDetails(){
            const token = document.querySelector("[name='csrf-token']").getAttribute("content")
            if (token !== null){
                axios.defaults.headers.common['X-CSRF-TOKEN'] = token
                axios.get('/user/details').then((res) => {
                    console.log(res)
                    this.isUser = res.data.isUser
                })
            }
        },
        getCats(){
            const token = document.querySelector("[name='csrf-token']").getAttribute("content")
            if (token !== null){
                axios.defaults.headers.common['X-CSRF-TOKEN'] = token
                axios.get('/get/cat').then((res) => {
                    console.log('the categories')
                    console.log(res['data']['result'])
                    this.cats = res['data']['result']
                })
            }
        },
        changeId(e){
            e.preventDefault()
            console.log("tata")
            console.log(e.target.id)
            this.id = e.target.id
            if(e.target.id != '' && e.target.id != null){
                this.update.append("id" , e.target.id)
            }
            this.show2 = true
            console.log("the id" , this.id)
        },
        changeSometing(e){
            this.edit = true
            console.log(e.target.name)
            console.log(e.target.value)
            this.update.append(e.target.name , e.target.value)
        },
        sendUpdate(e){
            e.preventDefault()
            this.state = true
            const token = document.querySelector("[name='csrf-token']").getAttribute("content")
            if (token !== null){
                axios.defaults.headers.common['X-CSRF-TOKEN'] = token
                axios.post('/ressource/update' , this.update).then((res) => {
                    console.log(res)
                    if (res.status == 200){
                        this.show2 = false
                    }
                })
            }
        }

    },
    mounted() {
        let date = new Date()
        if(date.getHours() < 12){
            document.getElementById("hello").innerText = "صباح الخير"
            document.getElementById("ico").src = "https://res.cloudinary.com/dy6vgsgr8/image/upload/v1659609676/icons8-morning-80_lfsm4d.png"
        }else{
            document.getElementById("hello").innerText = "مساء الخير"
            document.getElementById("ico").src = "https://res.cloudinary.com/dy6vgsgr8/image/upload/v1659609668/icons8-evening-80_p0ywlv.png"
        }
        const token = document.querySelector('[name="csrf-token"]').getAttribute("content")
        setOptions({
            server: {
                url: window.location.origin,
                timeout: 7000,
                process: {
                    url: '/upload/issue',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': token,
                    },
                    withCredentials: false,
                    onload: (response) => {
                        console.log(response)
                        const res = JSON.parse(response);
                        console.log(res["path"])
                        this.issuePath = res["path"]
                        if(this.image2){
                           this.update.append('icon' , res["path"] )
                        }
                    },
                    onerror: (response) => response.data,
                    ondata: (formData) => {
                        formData.append('Hello', 'World');
                        return formData;
                    },
                },
            },
        });
        this.getUserDetails()
        this.getCats()
    }

}
</script>
