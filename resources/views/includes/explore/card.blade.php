<div class="modal-publication card-fade h-full cursor-pointer bg-black relative" onclick="toggleModal('.modal')" data-id="{{$image->id}}">
    <img class="photo object-cover" src="{{ $image->image_path }}" alt="Imagen"/>
    <div class="middle absolute">
        <div class="icons grid grid-flow-col gap-4">
            <div><i style="cursor:pointer;" class="fas fa-heart text-sm md:text-base" data-id="{{$image->id}}"></i> &nbsp;<span class="font-medium text-sm md:text-base">{{count($image->likes)}}</span></div>
            <div><i style="-moz-transform: scaleX(-1); -o-transform: scaleX(-1); -webkit-transform: scaleX(-1);transform: scaleX(-1); filter: FlipH;" class="fas fa-comment text-sm md:text-base"></i> &nbsp;<span class="font-medium text-sm md:text-base">{{count($image->comments)}}</span></div>
        </div>
    </div>
</div>