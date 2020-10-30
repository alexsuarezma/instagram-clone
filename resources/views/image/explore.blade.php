<x-app-layout>
<link rel="stylesheet" href="{{ asset('css/component/card-fade.css') }}">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="bg-gray-50 pt-8">
        <div class="flex justify-center mx-auto w-4/6 h-auto lg:w-4/6 w-full h-auto lg:px-8 px-0">
            @php    
                $item = 0;
                $bloque = 1;
            @endphp
            <div class="w-full">
                @foreach($images as $image)
                    @php    $item++;    @endphp
                    
                    @if ( $item == 1 )
                        <div class="grid {{($bloque == 1 || $bloque == 3) ? 'grid-flow-col' : ''}} grid-cols-3 grid-rows-2 gap-1 md:gap-8 mb-1 md:mb-8">
                    @endif
                            <div class="{{($item == 3 && ($bloque == 1 || $bloque == 3)) ? 'col-span-2 row-span-2' : ''}} {{($bloque == 3 && $item == 3) ? 'col-start-1' : ''}}">
                                @include('includes.explore.card')
                            </div>
                    @if ( $item == 3 && $bloque != 2)  
                        </div>
                        @if ( $bloque == 3 )  
                            @php    $bloque=1;    @endphp
                        @endif
                        @php    
                            $item = 0;
                            $bloque++;
                        @endphp
                    @endif
                    @if ( $item == 6)
                        </div>
                        @php    
                            $item = 0;
                            $bloque++;
                        @endphp
                    @endif           
                @endforeach
            </div>
        </div>            
    </div>
@include('includes.modal')
</x-app-layout>
