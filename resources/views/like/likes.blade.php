<x-app-layout>
<!-- ARREGLAR LIKES -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-2">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden"> 
                <div class="flex justify-center p-6 sm:px-20 border-b border-gray-200">   
                    <div class="">
                        @foreach($likes as $like)    
                            <!-- @include('includes.image', [
                                'image' => $like->image
                            ])     -->
                            {{$like->image->description}}
                        @endforeach
                        <div class="clearfix">
                        </div>
                        {{$likes->links()}}
                    </div>
                    @include('includes.sugerencia')
                </div>            
            </div>
        </div>
    </div>
</x-app-layout>