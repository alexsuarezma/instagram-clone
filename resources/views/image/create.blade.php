<x-app-layout>
    <x-slot name="header">
    </x-slot>
    
    <div class="bg-gray-100 lg:px-8 px-0 py-8">
        <div class="bg-white mx-auto w-4/6 border border-gray-300 p-10 lg:w-4/6 w-full h-auto px-0">
            <div class="flex items-center flex-col border-t border-gray-200">
                <div class="mt-8 text-2xl text-center">
                    Publica una imagen!
                </div>
                <div class="w-3/4 mt-6 mb-6 text-gray-500">
                    <x-jet-validation-errors class="mb-4" />
                    <form method="POST" action="{{ route('image.save') }}" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <x-jet-label class="py-2" value="Agrega una Imagen" />
                            <x-jet-input class="block mt-1 w-full" type="file" name="image_path" required autofocus autocomplete="" />
                        </div>

                        <div>
                            <input class="appearance-none bg-transparent border-none text-base w-full text-gray-700 mr-3 mt-6 p-4 leading-tight focus:outline-none" type="text" placeholder="Añade una descripción" name="description">
                        </div>
                        
                        <div class="flex justify-center mt-8">
                            <button type="submit" class="w-2/4 py-1 bg-blue-300 text-white text-sm font-semibold px-2 rounded">
                                Publicar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
