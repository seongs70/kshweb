<div class="media item__comment {{ $isReply ? 'sub' : 'top' }} data-id="{{ $comment->userNumber}}" id="comment_{{ $comment->userNumber }}">
    <div class="media-body">
        <h5 class="media-heading">
            {{ $comment->user->name }}
            <small>
                {{ $comment->created_at->diffForHumans() }}
            </small>
        </h5>
    </div>
    <div class="content__comment">
        {{ $comment->content }}
    </div>
    
    <div class="action__comment">
        @can('update', $comment)
            <button class="btn__edit__comment">댓글 수정</button>
            <button class="btn__delete__comment">댓글 삭제</button>
        @endcan
        
        if($currentUser)
            <button class="btn__reply__comment">답글 쓰기</button>
        @endif
        
            
        @if($currentUser)
        @include('comments'.partical.create', ['parentUserNumber' => $comment->userNumber ])
        @endif

        @can('update', $comment)
            @include('comments.partial.edit')
        @endcan

        @forelse($comment->replies as $reply)
            @include('coments.partial.comment',[
                'comment' => $reply,
                'isReply' => true,
                ])
        @empty
        @endforelse        
        
            
        @php
            $voted = null;
            
            if($current){
            $voted = $comment->votes->containers('userNumber', $currentUser->userNumber) ? 'disabled = "disabled"' : null;
            }
        @endphp                
        
        
        <div class="action__comment">
            @if($currentUser)
                <button class="btn__vote__comment" data-vote="up" title="좋아요" {{$voted}}>
                    <i class="fa fa-chevron-up"></i> <span> {{ $comment->upCount }}</span>
                </button>
                <span>|</span>
                <button class="btn__vote__comment" data-vote="down" tiele="싫어요" {{ $voted }}>
                    <i class="fa fa-chevron-down"></i> <span>{{ $comment->downCount}} </span>
                </button>
            @endif
        </div>
    </div>
    
</div>