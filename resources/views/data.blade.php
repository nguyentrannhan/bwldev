@foreach($images as $image)
    {{--header--}}
    <div id="header" class="d-flex justify-content-between p-2 px-3">
        <div class="d-flex flex-row align-items-center">
            <img src="https://i.imgur.com/UXdKE3o.jpg" width="50" class="rounded-circle"
                 alt="avatar">
            <div class="d-flex flex-column ml-2"><span class="font-weight-bold">User Name</span>
            </div>
            <div class="d-flex flex-row align-items-center ellipsis ml-3">
                <small class="mr-2">
                    {{gmdate('d/m/Y H:m:s', $image->createdTimestamp->__toString() / 1000)}}
                </small>
            </div>
        </div>
        <div class="d-flex flex-row align-items-center ellipsis">
            <i class="fa fa-ellipsis-h"></i>
        </div>
    </div>
    {{--content--}}
    @if(isset($image->links[0]))
        <div id="image">
            <img src="{{$image->links[0]}}" class="img-fluid" alt="{{$image->links[0]}}">
        </div>
    @endif
    {{--reaction--}}
    <div id="reaction" class="p-2">
        <div class="d-flex flex-row justify-content-between pl-3 pr-3 pt-3 pb-1">
            <ul class="list-inline d-flex flex-row align-items-center m-0">
                @foreach($image->reactions as $reaction)
                    <li class="list-inline-item">
                        <button class="btn btn-reaction">
                            {{$reaction->emoji}}
                        </button>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <hr>
@endforeach
