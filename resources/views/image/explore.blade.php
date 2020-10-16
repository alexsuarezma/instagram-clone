<x-app-layout>
<link rel="stylesheet" href="{{ asset('css/component/card-fade.css') }}">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    
    <div class="bg-gray-50 pt-8">
        <div class="flex justify-center mx-auto w-4/6 h-screen lg:w-4/6 w-full h-auto lg:px-8 px-0">
            @php    
                $bloque = 1;    
                $item = 0;
                $isClose = false;
            @endphp
            <div class="w-full">
                
                @foreach($images as $image)
                    @php       
                        $item++;
                    @endphp
                    @if ( ($bloque == 1 || $bloque == 3) && $item == 1 )
                        <div class="w-full flex">
                    @endif
                    <!-- PRIMER BLOQUE -->
                    @if ( $bloque == 1 )
                        @if ( $item <= 2 )
                            @if ( $item == 1 )
                                <div class="w-2/6">
                            @endif
                                <!-- THIRDROW -->
                                @include('includes.explore.thirdRow')
                        @endif
                        @if ( $item == 3 )  
                            </div>
                            <div class="w-4/6">
                                <!-- FIRSTROW -->
                                @include('includes.explore.firstRow')
                            </div>
                            @php    
                                $isClose = true;
                            @endphp
                        @endif
                    @endif
                    <!-- SEGUNDO BLOQUE -->
                    @if ( $bloque == 2 )
                        @if ( $item == 1 )
                            <div class="w-full grid grid-cols-3 place-content-start">
                        @endif
                                @include('includes.explore.secondRow')
                        @if ( $item == 6 )
                            </div>
                            @php    
                                $isClose = true;
                            @endphp
                        @endif   
                    @endif
                    <!-- TERCER BLOQUE -->
                    @if ( $bloque == 3 )
                        @if ( $item == 1 )  
                            <div class="w-4/6">
                                <!-- FIRSTROW -->
                                @include('includes.explore.firstRow')
                            </div>
                        @endif
                        @if ( $item > 1 )
                            @if ( $item == 2 )
                                <div class="w-2/6">
                            @endif
                                    <!-- THIRDROW -->
                                    @include('includes.explore.thirdRow')
                            @if ( $item == 3 )
                                </div>
                                @php    
                                    $isClose = true;
                                @endphp
                            @endif
                        @endif
                    @endif

                    @if ( $isClose )
                        @if ( $bloque == 1 || $bloque == 3 )
                            </div>
                        @endif
                        @if ( $bloque == 3 )
                            @php    
                                $bloque=0;
                            @endphp
                        @endif
                        @php    
                            $bloque++;
                            $item = 0;
                            $isClose = false;
                        @endphp
                    @endif   

                @endforeach
            </div>
        </div>            
    </div>
@include('includes.modal')
</x-app-layout>
