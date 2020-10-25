<div>
    <form wire:submit.prevent="enviarMensaje" class="w-full">
        <div class="flex items-center border rounded-full border-gray-300 px-4 py-1">
            <input wire:model="content" class="bg-transparent w-full text-sm text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" placeholder="Envia un mensaje...">
            <button wire:click="enviarMensaje" class="flex-shrink-0 border-transparent border-4 font-semibold text-teal-400 text-sm py-1 px-2 rounded" type="button">
                Enviar
            </button>
        </div>
        <small class="text-lg font-gray-500" wire:loading wire:target="enviarMensaje">
            Enviando Mensaje...
        </small>
        @error("content") <small class="text-red-500"> {{$message}} </small> @enderror
    </form>   
    <div class="bg-blue-100 border-t border-b hidden border-blue-500 text-blue-700 px-4 py-3" id="message-success" role="alert">
        <p class="font-bold">Informational message</p>
        <p class="text-sm">Some additional text to explain said message.</p>
    </div>

    <script>

        window.livewire.on('mensajeEnviado', () => {
            // $('#message-success').css("display","block")

            // setTimeout(() => {
            //     $('#message-success').fadeOut('slow') 
            // }, 3000);
        })
    </script> 

</div>
