<div class="media media__create__comment {{ isset($parentUserNumber) ? 'sub' : 'top' }}">
    <div class="media-body">
        <form method="post" action="{{ route('posts.comments,store', $post->userNUmber) }}" class="form-horizontal">
            {!! csrf_field() !!}
            
            @if(isset($parentUserNumber))
                <input type="hidden" name="parentUserNumber" value="{{ $parentUserNumber}}">
            @endif
            
            <div class="form-group" {{ $errors->has('commentContent') ? 'has-error' : '' }}">
                <textarea name="commentContent" class="form-control">{{ old('commentContent') }}</textarea>
                {!! $errors->first('commentContent', '<span class="form-error">:message</span>!!}
            </div>
            
            <button type="submit" class="btn btn-primary btn-sm">
                전송하기
            </button>
        </form>
    </div>
</div>