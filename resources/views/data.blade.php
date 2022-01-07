@php $discordAddress = 'https://cdn.discordapp.com/'; @endphp
@php $ipAddress = 'http://172.16.11.90/'; @endphp
@foreach( $messages as $message )
    <div class="card">
        {{--header--}}
        <div id="header" class="header-flex justify-content-between p-2 px-3">
            <div class="header-flex flex-row align-items-center">
                <img src=" @if( $message->user->avatar == null ) {{ 'img/default-avatar.png' }}
                        @else {{ $discordAddress.'avatars/'.$message->user->id.'/'.$message->user->avatar }} @endif "
                     width="50" class="rounded-circle mr-2" alt="avatar">
                <div class="d-flex flex-column"><span class="font-weight-bold">{{ $message->user->username }}</span>
                </div>
            </div>
            <div class="d-flex flex-row align-items-center ellipsis">
                <small>
                    {{ gmdate('d/m/Y H:m', $message->createdTimestamp->__toString() / 1000) }}
                </small>
            </div>
        </div>
        {{--content--}}
        @if( isset($message->links[0]) )
            <div id="image">
                <img src="{{ $ipAddress.$message->links[0] }}" class="img-fluid" alt="{{ $message->links[0] }}">
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
