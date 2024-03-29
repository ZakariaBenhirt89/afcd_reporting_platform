<x-app-layout>
    <x-slot name="header">
        <h2 style="direction: rtl" class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('خريطة لجميع التبليغات') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div id="map" style="height: 100vh"></div>
            </div>
        </div>
    </div>
</x-app-layout>
