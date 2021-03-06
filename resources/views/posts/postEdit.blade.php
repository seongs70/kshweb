@extends('layouts.master')

@section('stylesheet')
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
@endsection
@section('script')
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>
    <script src="{{ asset('/js/summernote-ko-KR.js') }}"></script>
    <script>
    $(document).ready(function(e) {
        var winWidth=$(window).width();
        if(winWidth<960){
          $( '.panel-heading' ).css("display","none");
          $( '.page-header' ).css("display","none");
          $( '.m_notice' ).css("display","block");
          $( '.note-editor' ).css("min-height","40vw");
        }
    });
    </script>
    <style>
        #cke_1_contents { height: 450px; }
        #cke_32, #cke_16, #cke_46, #cke_19, #cke_26{display:none;}
        .saveBtn{margin:10px 0 100px 0; float:right;}
        .note-toolbar{height: 58px;}
        @media screen and (max-width:960px) {
            .note-toolbar { display:none; height:65vw;}
            .m_notice {
                width:100%; padding:4.5vw 0;
                background-color:white;
                box-shadow: 0 1px 7px 0 rgba(0,0,0,.15);
                display:block;  margin-bottom:5vw;
            }
            .m_notice span{
                margin-left:5vw; font-size:4.5vw;
                font-weight:bold;
             }
        }
    </style>
@endsection
@section('content')

<div class="m_notice">
    <span>글 작성하기</span>
</div>

<div class="container">
    <div class="page-header">
        <h2> <small> 글 수정하기</small></h2>
    </div>

    <form action="{{ route('posts.update', ['boardNumber' => $boardNumber, 'postNumber' => $postNumber]) }}" method="post">
      {!! csrf_field() !!}

        <input type="hidden" id="boardNumber" name="boardNumber" value="<?php echo $boardNumber; ?>">
        <input type="hidden" id="postNumber" name="postNumber" value="<?php echo $postNumber; ?>">
        <input type="hidden" id="boardTypeCode" name="boardTypeCode" value="<?php echo $boardTypeCode; ?>">
        <div class="form-group">
            <label for="postName">제목</label>
            <input type="text" name="postName" id="postName" class="form-control">
            {!! $errors->first('postName', '<span class="form-error" style="color:coral;">:message</span>') !!}
        </div>
        <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }} ">
            <label for="content">본문</label>
            <textarea name="postContent" id="postContent" rows="10" class="form-control"></textarea>
             {!! $errors->first('postContent', '<span class="form-error" style="color:coral;">:message</span>') !!}

          <script>
                $(document).ready(function() {
                  $('#postContent').summernote({
                    minHeight: 450,
                    lang: 'ko-KR' // default: 'en-US'
                  });
                });
           </script>
        </div>
        <button style="float:right;"><div class="btn btn-primary saveBtn">수정하기</div></button>
    </form>
</div>
@stop
