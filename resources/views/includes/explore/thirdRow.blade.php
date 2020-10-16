<div class="w-full"  style="">
    <a href="#" class="modal-open mb-8" data-id="{{$image->id}}">
        <div class="card-fade overflow-hidden bg-gray-400 m-2" style="height:300px;">
            <img class="photo w-full" style="position:absolute;
                    left: -100%;
                    right: -100%;
                    top: -100%;
                    bottom: -100%;
                    margin: auto;
                    min-height: 100%;
                    min-width: 100%;" 
                    src="{{ url('/user/image/'.$image->id) }}" alt="Imagen"
            />
            <div class="middle">
                <div class="icons">
                    <i style="cursor:pointer; font-size:17px;" class="fas fa-heart" data-id="{{$image->id}}"></i> &nbsp;<span class="font-medium text-base">{{count($image->likes)}}</span>
                    <i style="margin-left:25px;-moz-transform: scaleX(-1); -o-transform: scaleX(-1); -webkit-transform: scaleX(-1);transform: scaleX(-1); filter: FlipH; font-size:17px;" class="fas fa-comment"></i> &nbsp;<span class="font-medium text-base">{{count($image->comments)}}</span>
                </div>
            </div>
        </div>
    </a>
</div>