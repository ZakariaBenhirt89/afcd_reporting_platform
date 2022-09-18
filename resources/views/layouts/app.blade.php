<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'EcoCitizen') }}</title>

        <!-- Fonts -->


        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Almarai&display=swap" rel="stylesheet">
        <link
            href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
            rel="stylesheet"
        />
        <link
            href="https://unpkg.com/filepond-plugin-image-edit/dist/filepond-plugin-image-edit.css"
            rel="stylesheet"
        />

        @livewireStyles

        <!-- Scripts -->
        <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script>
            tinymce.init({
                selector: 'textarea#myeditorinstance', // Replace this CSS selector to match the placeholder element for TinyMCE
                plugins: 'code table lists image',
                toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table | image',
                image_title: true,
                /* enable automatic uploads of images represented by blob or data URIs*/
                automatic_uploads: true,
                /*
                  URL of our upload handler (for more details check: https://www.tiny.cloud/docs/configure/file-image-upload/#images_upload_url)
                  images_upload_url: 'postAcceptor.php',
                  here we add custom filepicker only to Image dialog
                */
                file_picker_types: 'image',
                /* and here's our custom image picker*/
                file_picker_callback: (cb, value, meta) => {
                    const input = document.createElement('input');
                    input.setAttribute('type', 'file');
                    input.setAttribute('accept', 'image/*');
                    let formData = new FormData();
                    const token = document.querySelector('[name="csrf-token"]').getAttribute("content")
                    axios.defaults.headers.common['X-CSRF-TOKEN'] = token
                    axios.defaults.headers.common['Content-Type'] = "multipart/form-data"

                    input.addEventListener('change', (e) => {
                        const file = e.target.files[0];
                        formData.append("file" , file)
                        axios({
                            headers: {
                                'Content-Type': 'multipart/form-data'
                            },
                            method: 'post',
                            url: '/upload/photo',
                            data : formData
                        }).then(res => {
                            if (res.data["result"]){
                            console.log(res.data["path"])
                            }
                        });

                        const reader = new FileReader();
                        reader.addEventListener('load', () => {
                            /*
                              Note: Now we need to register the blob in TinyMCEs image blob
                              registry. In the next release this part hopefully won't be
                              necessary, as we are looking to handle it internally.
                            */
                            const id = 'blobid' + (new Date()).getTime();
                            const blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                            const base64 = reader.result.split(',')[1];
                            const blobInfo = blobCache.create(id, file, base64);
                            blobCache.add(blobInfo);

                            /* call the callback and populate the Title field with the file name */
                            cb(blobInfo.blobUri(), { title: file.name });
                        });
                        reader.readAsDataURL(file);

                    });

                    input.click();
                },
                content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
            });
        </script>
        <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>


    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')
        <!-- This example requires Tailwind CSS v2.0+ -->
        <!-- Global notification live region, render this permanently at the end of the document -->
        <div aria-live="assertive" class="fixed inset-0 flex items-end px-4 py-6 pointer-events-none sm:p-6 sm:items-start"  hidden>
            <div class="w-full flex flex-col items-center space-y-4 sm:items-end">
                <!--
                  Notification panel, dynamically insert this into the live region when it needs to be displayed

                  Entering: "transform ease-out duration-300 transition"
                    From: "translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
                    To: "translate-y-0 opacity-100 sm:translate-x-0"
                  Leaving: "transition ease-in duration-100"
                    From: "opacity-100"
                    To: "opacity-0"
                -->
                <div class="max-w-sm w-full bg-white shadow-lg rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden" id="notfication" hidden>
                    <div class="p-4">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <!-- Heroicon name: outline/inbox -->
                                <svg class="h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                </svg>
                            </div>
                            <div class="ml-3 w-0 flex-1 pt-0.5">
                                <p class="text-sm font-medium text-gray-900">App Logo Updated</p>

                            </div>
                            <div class="ml-4 flex-shrink-0 flex">
                                <button class="bg-white rounded-md inline-flex text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" id="hideNotification">
                                    <span class="sr-only">Close</span>
                                    <!-- Heroicon name: solid/x -->
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @livewireScripts
        <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
        <script src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.js"></script>
        <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
        <script src="https://unpkg.com/filepond-plugin-image-edit/dist/filepond-plugin-image-edit.js"></script>

        <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
        <script>
        FilePond.registerPlugin(
        FilePondPluginImagePreview,
        FilePondPluginImageExifOrientation,
        FilePondPluginFileValidateSize,
        FilePondPluginImageEdit
        );

        // Select the file input and use
        // create() to turn it into a pond
        FilePond.create(
        document.querySelector('#applogo')
        );
        const token = document.querySelector('[name="csrf-token"]').getAttribute("content")
        FilePond.setOptions({
            server: {
                url: 'http://localhost:8000',
                timeout: 7000,
                process: {
                    url: '/upload/logo',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': token,
                    },
                    withCredentials: false,
                    onload: (response) => {
                        console.log(response)
                        const res = JSON.parse(response);
                        console.log(res["path"])
                        document.getElementById("logoUrl").value = res["path"]
                        document.getElementById("notfication").removeAttribute("hidden")
                    },
                    onerror: (response) => response.data,
                    ondata: (formData) => {
                        formData.append('Hello', 'World');
                        return formData;
                    },
                },
            },
        });
         function hideNotification(e){
            e.preventDefault()
            document.getElementById("notfication").setAttribute("hidden" , "true")
        }
        document.getElementById("hideNotification").addEventListener("click" , hideNotification)
        </script>
        <!-- This example requires Tailwind CSS v2.0+ -->
        <!-- Global notification live region, render this permanently at the end of the document -->
        <!-- This example requires Tailwind CSS v2.0+ -->
        <!-- Global notification live region, render this permanently at the end of the document -->
        <script
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8FFufEgDxvJzCRW1sdp-prGFbPI1_tN8&callback=initMap&v=weekly"
            defer
        ></script>
        <script src="{{ mix('js/app.js') }}" defer></script>

    </body>
</html>
