<x-app-layout>
<script src="{{ asset('js/comment-home.js') }}"></script>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
  <style>
    .modal {
      transition: opacity 0.25s ease;
    }
    .modal-active {
      overflow-x: hidden;
      overflow-y: visible !important;
    }
  </style>
    <div class="bg-gray-50 pb-8 pt-8">
        <div class="flex justify-center lg:justify-between mx-auto lg:w-4/6 w-full {{ ($images == []) ? 'h-screen' : 'h-auto' }} lg:px-8 px-0">
            <div class="lg:w-3/5 sm:w-5/6 w-full">
                @foreach($images as $index => $image)    
                    @include('includes.image', [
                        'images' => $image
                    ])
                @endforeach

                @empty($image)
                  <div class="w-full py-8 bg-white overflow-hidden rounded border border-gray-300 flex justify-center shadow">
                    <div class="text-center">
                      <p class="text-lg text-center font-semibold text-gray-700">BIENVENIDO AL CLON DE INSTAGRAM.</p>
                        <div class="flex justify-center my-16">
                          <img class="w-2/4" src="{{ asset('images/notfound.webp') }}" alt="">
                        </div>
                      <span class="text-lg text-center font-semibold text-gray-700"> 
                          Esta muy limpio aqui, parece que aun no sigues a nadie.
                          <p class="text-sm text-gray-500 font-normal mb-8">Empieza publicando una foto, sigue a un amigo, o explora...</p>
                      </span>
                      <div class="flex justify-center">
                        <a class="text-gray-700 text-center px-8" href="{{route('image.create')}}">
                          <div class="flex justify-center">
                            <i style="font-size:27px;" class="far fa-plus-square"></i>
                          </div>
                          <p class="text-sm text-gray-500 font-normal hover:text-teal-500 hover:font-semibold">Publicar foto</p>
                        </a>
                        <a class="px-8 text-center" href="{{ route('image.getRandom') }}">
                          <div class="flex justify-center">
                            <svg aria-label="Buscar personas" class="_8-yf5 " fill="#262626" height="27" viewBox="0 0 48 48" width="27"><path clip-rule="evenodd" d="M24 0C10.8 0 0 10.8 0 24s10.8 24 24 24 24-10.8 24-24S37.2 0 24 0zm0 45C12.4 45 3 35.6 3 24S12.4 3 24 3s21 9.4 21 21-9.4 21-21 21zm10.2-33.2l-14.8 7c-.3.1-.6.4-.7.7l-7 14.8c-.3.6-.2 1.3.3 1.7.3.3.7.4 1.1.4.2 0 .4 0 .6-.1l14.8-7c.3-.1.6-.4.7-.7l7-14.8c.3-.6.2-1.3-.3-1.7-.4-.5-1.1-.6-1.7-.3zm-7.4 15l-5.5-5.5 10.5-5-5 10.5z" fill-rule="evenodd"></path></svg>
                          </div>
                          <p class="text-sm text-gray-500 font-normal hover:text-teal-500 hover:font-semibold">Explora</p>
                        </a>
                      </div>
                    </div>
                  </div>
                @endempty
                <div class="clearfix">
                </div>
                {{$images->links()}}
                
            </div>
            <div class="w-2/5 lg:block hidden">
              @include('includes.sugerencia')        
            </div>
        </div>
    </div>
    @include('includes.modal')
</x-app-layout>
