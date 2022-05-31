<div class="md:grid md:grid-cols-3 md:gap-6">
    <h3 class="text-lg font-medium text-gray-900">
       Update the app logo
    </h3>

    <div class="mt-5 md:mt-0 md:col-span-2">
        <form wire:submit.prevent="save">
            <div class="px-4 py-5 bg-white sm:p-6 shadow {{ isset($actions) ? 'sm:rounded-tl-md sm:rounded-tr-md' : 'sm:rounded-md' }}">
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-5">
                        <label class="block font-medium text-sm text-gray-700" for="current_password">
                            New logo
                        </label>
                        <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full " id="applogo" type="file" name="logo">
                        <input id="logoUrl" name="logoUrl" type="text" wire:model="logoUrl" hidden>

                    </div>
                    </div>
                </div>

            <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">

            </div>
        </form>
    </div>
</div>

