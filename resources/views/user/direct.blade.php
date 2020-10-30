<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div class="bg-gray-100 lg:px-10 px-0 py-8 h-screen">
        <div class="flex bg-white mx-auto lg:w-4/6 w-full h-full border border-gray-300">
            <div class="w-2/6 h-full border-r border-gray-300">
                <div class="flex justify-center items-center border-b border-gray-300 mb-2" style="height:60px;">
                   <span class="text-lg font-semibold text-gray-700">Direct</span>
                </div>
                <div class="overflow-y-auto" style="height:88%">
                    <livewire:users-list/>
                </div>
            </div>
            <livewire:chat-list/>
        </div>
    </div>
</x-app-layout>
