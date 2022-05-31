

<div class="md:grid md:grid-cols-3 md:gap-6">
    <h2>
        <x-slot name="title">{{ $title }}</x-slot>
        <x-slot name="description">{{ $description }}</x-slot>
    </h2>

    <div class="mt-5 md:mt-0 md:col-span-2">
        <form >
            <div class="px-4 py-5 bg-white sm:p-6 shadow {{ isset($actions) ? 'sm:rounded-tl-md sm:rounded-tr-md' : 'sm:rounded-md' }}">
                <div class="grid grid-cols-6 gap-6">
                    {{ $form }}
                </div>
            </div>


        </form>
    </div>
</div>
