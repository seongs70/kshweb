@extends('layouts.master')

@section('content')
<script src="//code.jquery.com/jquery.min.js"></script>
<link href="{{ asset('/css/postShow.css') }}" rel="stylesheet" type="text/css" >
<script src="{{ asset('/js/postShow.js') }}"></script>
<div class="container" id="container">
    <!-- 게시글정보 받아와서 문자배열처 -->
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
    <!-- php구문 사용 문법 -->
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
    <!-- 로그인 안하였으면 투표기능 안됨    -->
    @if(auth()->user() == null)
       <script>
          $(function() {
            $(".btn__vote__comment")
              .click(function() { alert("World"); })
              .prop("disabled", true);
          });
        </script> 
    @endif
    <!-- 중복투표 방지 -->
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
                    <input type="hidden" id="boardTypeCode" name="boardTypeCode" value="<?php echo $boardTypeCode; ?>">
                    <input type="hidden" id="boardNumber" name="boardNumber" value="<?php echo $boardNumber; ?>">
                    <input type="hidden" id="postNumber" name="postNumber" value="<?php echo $postNumber; ?>">
                    <input type="hidden" id="postContent1" name="postContent" value="{{$post->postContent}}">
                    <input type="hidden" id="postName" name="postName" value="{{$post->postName}}">
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
                    <input type="hidden" id="boardTypeCode" name="boardTypeCode" value="<?php echo $boardTypeCode; ?>">
                    <button class="btn btn-default" type="submit">글 삭제</button>
            </form>
        @endcan
        
        <a href="{{route('posts.index', ['boardNumber' => $boardNumber, 'boardTypeCode' => $boardTypeCode])}}" class="btn btn-default">글 목록</a>
    </div>
    <div class="fileWrap">       
        @forelse($files as $file)
            <form method="get" action="{{ route('posts.filedownload', ['boardNumber' => $boardNumber, 'postNumber' => $postNumber]) }}" class="btn btn-warning">
                {!! csrf_field() !!}
                <a href="{{ route('posts.show', ['boardNumber' => $boardNumber, 'postNumber' => $postNumber]) }}">
                <button type="submit">{{ $file->fileName }}</button> 
                <input type="hidden" name="fileDownload" value="{{ $file->fileName }}">
                </a>
            </form>
        @empty
        @endforelse      
    </div>        
    <div class="com"><h4>댓글</h4></div>
    <!--댓글 인덱스-->
    <div class="comment_Wrap">
        <div class="container__comment"> 
            @forelse($comments as $comment)
                @if($comment->parentCommentNumber==null)
                    @if($comment->user['userId'] == $currentUser)
                        <div class="comment_update">
                            @can('update', $comment)
                                <div class="editButton"><button>수정</button></div>
                                <div class="commentEditWrap">
                                    <div class="editShow">
                                        <form method="post" action="{{ route('posts.commentUpdate', ['boardNumber' => $boardNumber, 'postNumber' => $postNumber, 'commentNumber' => $comment->commentNumber]) }}">
                                         {!! csrf_field() !!}
                                        <input type="hidden" name="commentNumber" value="<? echo $comment->commentNumber; ?>">
                                        <input type="text" name="commentContent">
                                        <button class="editComment" type="submit">댓글 수정</button>      
                                        </form>
                                        <div class="commentCancle"><a>|취소</a></div>
                                    </div>
                                </div>    
                            @endcan
                        </div>
                    @endif      
                    <div class="commentRegister">
                        @if($comment->user['userId'] == $currentUser)
                            @can('delete', $comment)
                          
                                <form method="post" style="display:inline-block; float:right;" action="{{ route('posts.commentDelete', ['boardNumber' => $boardNumber, 'postNumber' => $postNumber, 'commentNumber' => $comment->commentNumber]) }}">
                                     {!! csrf_field() !!}
                                    <input type="hidden" name="commentNumber" value="{{ $comment->commentNumber }}">
                                    <button class="editComment" type="submit">댓글삭제</button>      
                                </form>
                            @endcan     
                        @endif 
                        <ul>
                           <li>{{ $comment->user['nickName']}}</li>
                           <li>{{ $comment->created_at->diffForHumans()}}</li>
                        </ul>
                        <div class="commentContent1">{{ $comment->commentContent}}</div>
                    </div> 
                    @forelse($comments as $repliy)
                        @if($repliy->parentCommentNumber==$comment->commentNumber)
                            <div class="commentRepliy commentRegister">
                                <img src="/images/recomment2.png">
                                <ul>
                                    <li>{{ $repliy->user['nickName']}}</li>
                                    <li>{{ $repliy->created_at->diffForHumans()}}</li>
                                </ul>
                                <div class="commentContent1 commentContent2">{{ $repliy->commentContent}}</div>
                            </div>
                        @endif   
                    @empty
                    @endforelse
                    @if($currentUser)
                        <a class="repliyWrite"><img src="/images/recomment.png" style="width:20px; margin-right:10px;">답글&nbsp;&nbsp;</a>
                    @endif
                    <div class="repliy">
                        <form method="post" action="{{ route('posts.comment', ['boardNumber' => $boardNumber, 'postNumber' => $postNumber]) }}" class="form-horizontal">
                            {!! csrf_field() !!}
                                <input type="hidden" name="parentCommentNumber" value="{{ $comment->commentNumber }}">
                                <input type="hidden" id="userNumber" name="userNumber" value="<?php echo $currentUserNumber; ?>">
                                <input type="hidden" id="boardNumber" name="boardNumber" value="<?php echo $boardNumber; ?>">
                                <input type="hidden" id="postNumber" name="postNumber" value="<?php echo $postNumber; ?>">
                                <input type="hidden" id="statusValue" name="statusValue" value="1">
                            <div class="form-group ReCom" {{ $errors->has('commentContent') ? 'has-error' : '' }}>
                                <div class="recomment2"></div>
                                <textarea name="commentContent" class="form-control commentText" 
                                style="width:770px; margin-left:53px; min-height:73px; float:left; clear:both;" class="form-control reComment">{{-- old('commentContent') --}}</textarea>
                                {{--!! $errors->first('commentContent', '<span class="form-error">:message</span>!!--}}
                                <button type="submit" class="btn btn-primary btn-sm sendButton" style="margin-bottom:15px; height:73px; 
                                width:100px; float:left;">
                                전송하기
                                </button>
                                
                                <div class="commentError" style="position:absolute; bottom:-5%; color:coral; left:7.5%">{{ $errors->first('commentContent') }}</div>
                            </div>
                        </form>
                        <div class="repliyCancle"><a>취소</a></div>
                    </div>
                @endif 
            @empty
            @endforelse
        </div>
        <!--댓글 create-->
        <div class="media media__create__comment {{-- isset($parentCommentNumber) ? 'sub' : 'top' --}}" style="clear:both;">
            @if($currentUser)
                <div class="media-body">
                    <form method="post" action="{{ route('posts.comment', ['boardNumber' => $boardNumber, 'postNumber' => $postNumber]) }}" class="form-horizontal">
                        {!! csrf_field() !!}
                        @if(isset($parentUserNumber))
                            <input type="hidden" name="parentUserNumber" value="{{ $parentCommentNumber}}">
                        @endif
                            <input type="hidden" id="userNumber" name="userNumber" value="<?php echo auth()->user()->userNumber; ?>">
                            <input type="hidden" id="boardNumber" name="boardNumber" value="<?php echo $boardNumber; ?>">
                            <input type="hidden" id="postNumber" name="postNumber" value="<?php echo $postNumber; ?>">
                            <input type="hidden" id="statusValue" name="statusValue" value="1">
                        <div class="form-group" {{-- $errors->has('commentContent') ? 'has-error' : '' --}}">
                            <textarea name="commentContent" class="form-control commentText" 
                            style="width:809px; margin-left:29px; min-height:73px; float:left;">{{-- old('commentContent') --}}</textarea>
                            {{--!! $errors->first('commentContent', '<span class="form-error">:message</span>!!--}}
                            <button type="submit" class="btn btn-primary btn-sm sendButton" style="margin-bottom:15px; height:73px; 
                            width:100px; float:left;">
                            전송하기
                            </button>
                            <div class="commentError" style="color:coral; clear:both; margin-left:30px;">{{ $errors->first('commentContent') }}</div>
                        </div> 
                    </form>
                </div>
            @endif
        </div>
    </div><!-- comment_Wrap -->
</div><!-- container -->                                
@stop
  
