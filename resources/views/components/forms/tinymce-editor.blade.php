    <!-- Simplicity is the consequence of refined emotions. - Jean D'Alembert -->
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="md:flex md:items-center md:justify-between" style="height: 10vh">
        <div class="flex-1 min-w-0 flex">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate" id="hello">Hello Msg</h2>
            <img id="ico" class="h-10 mx-3" src="https://res.cloudinary.com/dy6vgsgr8/image/upload/v1659609676/icons8-morning-80_lfsm4d.png" alt="hello pic"/>
        </div>
        <div class="mt-4 flex md:mt-0 md:ml-4">
            <button type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Add new issue</button>
            <button type="button" class="mx-5 inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Publish new resource</button>
        </div>
    </div>
    <script>
     let date = new Date()
     if(date.getHours() < 12){
         document.getElementById("hello").innerText = "Good Morning"
         document.getElementById("ico").src = "https://res.cloudinary.com/dy6vgsgr8/image/upload/v1659609676/icons8-morning-80_lfsm4d.png"
     }else{
         document.getElementById("hello").innerText = "Good Evening"
         document.getElementById("ico").src = "https://res.cloudinary.com/dy6vgsgr8/image/upload/v1659609668/icons8-evening-80_p0ywlv.png"
     }
    </script>

