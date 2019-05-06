@extends('layouts.master')

@section('content')
<link href="{{ asset('/css/postShowQ&A.css') }}" rel="stylesheet" type="text/css" >
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>
<script src="{{ asset('/js/summernote-ko-KR.js') }}"></script>
<script src="{{ asset('/js/postShowQ&A.js') }}"></script>
<script>
$(document).ready(function(e) {
    var winWidth=$(window).width();
    if(winWidth<960){
      $( '.postContent img' ).css("width","100%").css("height","inherit");
      $('#container2').css("margin-bottom","0");
    }
});
</script>
<div class="m_notice">
    @forelse($posts as $post)
        <span>{{ $post->postName }}</span>
    @empty
    @endforelse
</div>
<div class="container" id="container">
    @forelse($posts as $post)
        <div class="postShow_header1">
           <ul>
               <li>{{ $post->postName }}</li>
               <li>{{ $boardName }}</li>
           </ul>
        </div>
        <div class="postShow_header2">
           <ul>
               <li>{{ $post->user['nickName']}}</li>
               <li>{{ $post->created_at->diffForHumans()}}</li>
               <li>조회 {{ $post->viewCount }}</li>
           </ul>
        </div>
        <div class="postContent">
            {!! $post->postContent !!}
        </div>
    @empty
    @endforelse
    @php
        if(auth()->user() == null)
        {
        $currentUser = null;
        $currentUserNumber = null;
        }
        else{
        $currentUser = auth()->user()->userId;
        $currentUserNumber = auth()->user()->userNumber;
        }
    @endphp
    <!--투표-->
    @if(auth()->user() == null)
       <script>
          $(function() {
            $(".btn__vote__comment")
              .click(function() { alert("World"); })
              .prop("disabled", true);
          });
        </script>
    @endif
    @forelse($vote as $voteFunction)
        @if($voteFunction->userNumber == $currentUserNumber)
           <script>
              $(function() {
                $(".btn__vote__comment")
                  .click(function() { alert("World"); })
                  .prop("disabled", true);
              });
            </script>
        @endif
    @empty
    @endforelse
    <div class="voteFunction">
        <ul>
            <form method="get" action="{{ route('posts.vote', ['boardNumber' => $boardNumber, 'postNumber' => $postNumber]) }}" class="form-horizontal">
                {!! csrf_field() !!}
                <input type="hidden" id="userNumber" name="userNumber" value="<?php echo $currentUserNumber; ?>">
                <input type="hidden" id="postNumber" name="postNumber" value="<?php echo $postNumber; ?>">
                <input type="hidden" id="up" name="up" value="1">
                <button class="btn__vote__comment" type="submit">
                    <li class="btn btn-default">
                    <img src="/images/up.png" />
                    {{ $vote->sum('up') }}
                    </li>
                </button>
            </form>
            <form method="get" action="{{ route('posts.vote', ['boardNumber' => $boardNumber, 'postNumber' => $postNumber]) }}" class="form-horizontal">
                {!! csrf_field() !!}
                <input type="hidden" id="userNumber" name="userNumber" value="<?php echo $currentUserNumber; ?>">
                <input type="hidden" id="postNumber" name="postNumber" value="<?php echo $postNumber; ?>">
                <input type="hidden" id="down" name="down" value="1">
                <button class="btn__vote__comment" type="submit">
                    <li class="btn btn-default">
                    <img src="/images/down.png" />
                    {{ $vote->sum('down') }}
                    </li>
                </button>
            </form>
        </ul>
    </div>

    <div class="text-right action__post">
        @can('update', $post)
            <a href="{{ route('posts.edit', ['boardNumber' => $boardNumber, 'postNumber' => $postNumber]) }}" >
                <form method="get" action="{{ route('posts.edit', ['boardNumber' => $boardNumber, 'postNumber' => $postNumber]) }}" class="btn btn-default">
                   {!! csrf_field() !!}
                    <input type="hidden" id="boardNumber" name="boardNumber" value="<?php echo $boardNumber; ?>">
                    <input type="hidden" id="postNumber" name="postNumber" value="<?php echo $postNumber; ?>">
                    <input type="hidden" id="postContent1" name="postContent" value="{{$post->postContent}}">
                    <input type="hidden" id="postName" name="postName" value="{{$post->postName}}">
                    <input type="hidden" id="boardTypeCode" name="boardTypeCode" value="{{ $boardTypeCode }}">
                    <button type="submit">글 수정</button>
                </form>
            </a>
        @endcan
        @can('delete', $post)
            <form method="get" action="{{ route('posts.delete', ['boardNumber' => $boardNumber, 'postNumber' => $postNumber]) }}" style="display:inline-block;">
                   {!! csrf_field() !!}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" id="boardNumber" name="boardNumber" value="<?php echo $boardNumber; ?>">
                    <input type="hidden" id="postNumber" name="postNumber" value="<?php echo $postNumber; ?>">
                    <input type="hidden" name="_method" value="delete">
                    <button class="btn btn-default" type="submit">글 삭제</button>
            </form>

        @endcan
            <a href="{{route('posts.index', ['boardNumber' => $boardNumber, 'boardTypeCode' => $boardTypeCode])}}" class="btn btn-default">
                글 목록
            </a>
       <div class="fileWrap">
        @forelse($files as $file)
        <form method="get" action="{{ route('posts.filedownload', ['boardNumber' => $boardNumber, 'postNumber' => $postNumber]) }}" class="btn btn-warning">
            {!! csrf_field() !!}
            <a href="{{ route('posts.show', ['boardNumber' => $boardNumber, 'postNumber' => $postNumber]) }}">
            <button type="submit">
            {{ $file->fileName }}
            <input type="hidden" name="fileDownload" value="{{ $file->fileName }}"></button></a>
        </form>
        @empty
        @endforelse
        </div>
    </div>
    </div>
    @forelse($parentPosts as $parentPost)
        <div class="container" id="container2">
            <div class="rePost_wrap">
                <div class="postShow_header2">
                   <ul>
                       <li>{{ $parentPost->user['nickName']}}</li>
                       <li>{{ $parentPost->created_at->diffForHumans()}}</li>
                       <li>조회 {{ $parentPost->viewCount }}</li>
                   </ul>
                </div>
                <div class="postContent rePostContent">
                    {!! $parentPost->postContent !!}
                </div>
                <div class="rePostNumber">{{ $rePostNumber = $parentPost -> postNumber}}</div>
                <div class="text-center action__post">
                    @can('update', $parentPost)
                    <form method="get" action="{{ route('posts.edit', ['boardNumber' => $boardNumber, 'postNumber' => $postNumber]) }}">
                       {!! csrf_field() !!}
                        <input type="hidden" id="boardNumber" name="boardNumber" value="<?php echo $boardNumber; ?>">
                        <input type="hidden" id="postNumber" name="postNumber" value="<?php echo $rePostNumber; ?>">
                        <a href="{{ route('posts.edit', ['boardNumber' => $boardNumber, 'postNumber' => $postNumber]) }}" >
                        <button type="submit" class="btn btn-primary">글 수정</button></a>
                    </form>
                    @endcan
                    @can('delete', $parentPost)
                    <form method="get" action="{{ route('posts.delete', ['boardNumber' => $boardNumber, 'postNumber' => $postNumber]) }}">
                       {!! csrf_field() !!}
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" id="boardNumber" name="boardNumber" value="<?php echo $boardNumber; ?>">
                        <input type="hidden" id="postNumber" name="postNumber" value="<?php echo $rePostNumber; ?>">
                        <input type="hidden" name="_method" value="delete">
                        <button class="btn btn-primary" type="submit">글 삭제하기</button>
                    </form>
                    @endcan
                </div>
            </div>
        </div>
    @empty
    @endforelse
    @if(Auth::user())
    <div class="editWrap">
        <form method="post" action="{{ route('posts.store', ['boardNumber' => $boardNumber]) }}" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <input type="hidden" id="boardTypeCode" name="boardTypeCode" value="<?php echo $boardTypeCode; ?>">
            <input type="hidden" id="boardNumber" name="boardNumber" value="<?php echo $boardNumber; ?>">
            <input type="hidden" name="postName" id="postName" value="postParent<?php echo $postNumber; ?>" class="form-control"/>
            <input type="hidden" name="postparentNumber" id="postparentNumber" value="{{$postNumber}}" class="form-control"/>
            <div class="form-group {{ $errors->has('postContent') ? 'has-error' : '' }}">
              <textarea name="postContent" id="postContent" rows="10" class="form-control" style="margin-bottom:0;">{{ old('postContent') }}</textarea>
              <script>
                    $(document).ready(function() {
                        $('#container2').css("margin-bottom","10px");
                        $('#postContent').summernote({
                        minHeight: 200,
                        lang: 'ko-KR' // default: 'en-US'
                      });
                    });
               </script>
              {!! $errors->first('postContent', '<span class="form-error">:message</span>') !!}
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" style="float:right;">답글쓰기</button>
            </div>
        </form>
    </div>
    @endif
@stop
