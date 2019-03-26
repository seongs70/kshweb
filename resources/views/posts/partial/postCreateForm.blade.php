<form method="post" action="{{ route('posts.store', ['boardNumber' => $boardNumber]) }}" enctype="multipart/form-data" name="write_form" onsubmit="return checkIt()">
      {!! csrf_field() !!}
      <input type="hidden" id="boardTypeCode" name="boardTypeCode" value="<?php echo $boardTypeCode; ?>">
      <input type="hidden" id="boardNumber" name="boardNumber" value="<?php echo $boardNumber; ?>">
      <div class="form-group {{ $errors->has('postName') ? 'has-error' : '' }}">
          <label for="postName">제목</label>
          <input type="text" name="postName" id="postName" value="{{ old('postName') }}" class="form-control"/>
          {!! $errors->first('postName', '<span class="form-error" style="color:coral;">:message</span>') !!}
      </div>
      <div class="form-group {{ $errors->has('postContent') ? 'has-error' : '' }}">
          <label for="postContent">본문</label>
          <textarea name="postContent" id="postContent" rows="10" class="form-control">{{ old('postContent') }}</textarea>
          <script>
                $(document).ready(function() {
                  $('#postContent').summernote({
                    minHeight: 450,
                    lang: 'ko-KR' // default: 'en-US'
                  });
                });
           </script>
          {!! $errors->first('postContent', '<span class="form-error">:message</span>') !!}
      </div>
          @if( $boardTypeCode == 2 )
             <script>
                $('#fileCheck').change(
                function () {
                    var fileExtension = ['png'];
                    if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
                        alert("Only '.png' format is allowed.");
                        this.value = ''; // Clean field
                        return false;
                    }
                });
            </script>
              <input type="file" name="files[]" id="files fileCheck" class="form-control file" multiple="multiple" accept="image/*" required/>
                
          @else
              <input type="file" name="files[]" id="files" class="form-control file" multiple="multiple"/>
              <input type="file" name="files[]" id="files" class="form-control file" multiple="multiple"/>
              <input type="file" name="files[]" id="files" class="form-control file" multiple="multiple"/> 
          @endif
          
      <button type="submit" class="btn btn-primary saveBtn" id="submit" style="float:right; margin:50px 0; padding-top:10px; padding-bottom:10px;">
 
                  글 작성하기
  
      </button>
  </form>