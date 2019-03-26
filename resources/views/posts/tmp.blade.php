<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> 
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> 
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>
<script src="{{ asset('/js/summernote-ko-KR.js') }}"></script>
    <form method="post" action="{{ route('posts.store', ['boardNumber' => $boardNumber]) }}" enctype="multipart/form-data">
      {!! csrf_field() !!}
      <input type="hidden" id="boardTypeCode" name="boardTypeCode" value="<?php //echo $boardTypeCode; ?>">
      <input type="hidden" id="boardNumber" name="boardNumber" value="<?php echo $boardNumber; ?>">
      <input type="hidden" name="postName" id="postName" value="postParent<?php echo $postNumber; ?>" class="form-control"/>
      <input type="hidden" name="postparentNumber" id="postparentNumber" value="{{$postNumber}}" class="form-control"/>
      <div class="form-group {{ $errors->has('postContent') ? 'has-error' : '' }}">
          <textarea name="postContent" id="postContent" rows="10" class="form-control">{{ old('postContent') }}</textarea>
          <script>
                $(document).ready(function() {
                  $('#postContent').summernote({
                    minHeight: 200,
                    lang: 'ko-KR' // default: 'en-US'
                  });
                });
           </script>
          {!! $errors->first('postContent', '<span class="form-error">:message</span>') !!}
      </div>
      <br>
      <div class="form-group">
          <button type="submit" class="btn btn-primary">
              답글쓰기
          </button>
      </div>
  </form>               
   