@foreach($images as $image)
    <div class="card">
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
                <div class="btn-group dropleft">
                    <button type="button" class="btn btn-dropdown dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-ellipsis-h three-dots ellipsis"></i>
                    </button>
                    <div class="dropdown-menu">
                        <button class="dropdown-item" type="button">Option 1</button>
                        <button class="dropdown-item" type="button">Option 2</button>
                        <button class="dropdown-item" type="button">Option 3</button>
                    </div>
                </div>
            </div>
        </div>
        {{--content--}}
        @if(isset($image->links[0]))
            <div id="image">
                <img src="{{$image->links[0]}}" class="img-fluid" alt="{{$image->links[0]}}">
            </div>
        @endif
        {{--reaction--}}
        <div id="reaction" class="px-3 pt-3 pb-2 px-3">
            <div class="d-flex flex-row justify-content-between">
                <ul class="list-inline flex-row align-items-center m-0">
                    @foreach($image->reactions as $reaction)
                        <li class="list-inline-item list-reaction">
                            <button class="btn btn-reaction">
                                {{$reaction->emoji}}
                            </button>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        {{--comment--}}
{{--        <div class="px-2 pb-2 px-3">--}}
{{--            <div data-id="{{ $image->id }}" class="show-comments d-flex flex-row muted-color">--}}
{{--                <span>2 comments</span>--}}
{{--            </div>--}}
{{--            <div id="comments-{{ $image->id }}" class="comments">--}}
{{--                <hr>--}}
{{--                <div class="d-flex flex-row mb-2">--}}
{{--                    <img src="https://i.imgur.com/9AZ2QX1.jpg" width="40" class="rounded-image">--}}
{{--                    <div class="d-flex flex-column ml-2">--}}
{{--                        <span class="name">User Name</span>--}}
{{--                        <img src="https://i.imgur.com/9AZ2QX1.jpg" class="pb-1" style="max-width: 300px;">--}}
{{--                        <small class="comment-text">--}}
{{--                            This is comment--}}
{{--                        </small>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
@endforeach
