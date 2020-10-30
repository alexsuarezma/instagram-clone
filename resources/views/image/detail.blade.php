<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div class="bg-gray-100 py-8">
        <div class="flex justify-center mx-auto lg:w-4/6 w-full h-auto sm:p-6 lg:px-8 p-0">
            <div class="w-full border bg-white">
                @include('image.publication')
            </div>
        </div>
    </div>
</x-app-layout>
