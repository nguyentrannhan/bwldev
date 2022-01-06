@foreach( $messages as $message )
    <div class="card">
        {{--header--}}
        <div id="header" class="d-flex justify-content-between p-2 px-3">
            <div class="d-flex flex-row align-items-center">
                <img src=" @if( $message->user->avatar == null ) {{ 'img/default-avatar.png' }}
                        @else {{ $message->user->avatar }} @endif "
                     width="50" class="rounded-circle" alt="avatar">
                <div class="d-flex flex-column ml-2"><span class="font-weight-bold">{{ $message->user->username }}</span>
                </div>
                <div class="d-flex flex-row align-items-center ellipsis ml-3">
                    <small class="mr-2">
                        {{ gmdate('d/m/Y H:m:s', $message->createdTimestamp->__toString() / 1000) }}
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
        @if( isset($message->links[0]) )
            <div id="image">
                <img src="{{ $message->links[0] }}" class="img-fluid" alt="{{ $message->links[0] }}">
            </div>
        @endif
        {{--reaction--}}
        <div id="reaction" class="px-3 pt-3 pb-2 px-3">
            <div class="d-flex flex-row justify-content-between">
                <ul class="list-inline flex-row align-items-center m-0">
                    @foreach( $message->reactions as $reaction )
                        <li class="list-inline-item list-reaction">
                            <button class="btn btn-reaction">
                                {{ $reaction->emoji }}
                            </button>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        {{--comment--}}
        <div class="px-2 pb-2 px-3">
            @if( $message->comments->count() > 0 )
                <div data-id="{{ $message->id }}" class="show-comments d-flex flex-row muted-color">
                    <span>{{ $message->comments->count() }}
                        @if( $message->comments->count() > 1) {{ __('comments') }} @else {{ __('comment') }} @endif </span>
                </div>
            @endif
            <div id="comments-{{ $message->id }}" class="comments">
                <hr>
                @foreach( $message->comments as $comment )
                    <div class="d-flex flex-row mb-2">
                        <img src=" @if( $comment->user->avatar == null ) {{ 'img/default-avatar.png' }}
                        @else{{ $comment->user->avatar }}@endif" width="40" class="rounded-image" alt="avatar">
                        <div class="d-flex flex-column ml-2">
                            <span class="name">{{ $comment->user->username }}</span>
                            @if( $comment->comment )
                                <small class="comment-text pb-1">
                                    {{ $comment->comment }}
                                </small>
                            @endif
                            @if( !empty($comment->links) )
                                @foreach( $comment->links as $commentImage )
                                    <img src="{{ $commentImage }}" class="pb-1" style="max-width: 300px;"
                                         alt="{{ $commentImage }}">
                                @endforeach
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endforeach
