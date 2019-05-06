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
                  var winWidth=$(window).width();
                  if(winWidth<960){
                    $( '.note-toolbar' ).css("display","none");
                    $( '.note-editable' ).css("min-height","65vw");
                    $( '.title' ).css("display","none");
                    $( '.m_notice' ).css("display","block");
                    $( 'input[type="file"]:nth-child(2)' ).css("display","none");


                  }
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
              <input type="file" name="files[]" id="files fileCheck" class="form-control file" multiple="multiple" accept="image/*"  required/>
              <h5 style="color:coral; margin-top:70px; margin-left:14px;" >썸네일 파일 필수</h5>
          @else
              <input type="file" name="files[]" id="files" class="form-control file" multiple="multiple"/>
              <input type="file" name="files[]" id="files" class="form-control file" multiple="multiple"/>
              <input type="file" name="files[]" id="files" class="form-control file" multiple="multiple"/>
          @endif

      <button type="submit" class="btn btn-primary saveBtn" id="submit" style="float:right; margin:50px 0; padding-top:10px; padding-bottom:10px;">

                  글 작성하기

      </button>
  </form>
