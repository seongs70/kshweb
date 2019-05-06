@extends('layouts.master')
@section('content')

<link href="{{ asset('/css/postIndex.css') }}" rel="stylesheet" type="text/css" >
<script>
$(document).ready(function(e) {
    var winWidth=$(window).width();
    if(winWidth<960){
        $( '.thumbnailWrap ul li, .postIndex_thumbnail ul' ).css("width","96%" );
        // $( '.postIndex_thumbnail' ).css("width","100%" );
        $( '.postIndex_thumbnail ul li:nth-child(2)' ).css("width","96%" );
        $( '.postIndex_thumbnail ul li:nth-child(1)' ).css("width","100%" );
        $( '.postIndex_thumbnail' ).css("width","96%" );
        $( '.serarch_thumbail ul' ).css("margin-bottom","0px" );

    }
});
</script>
<div class="m_notice">
    <span>{{ $boardName }}</span>
</div>
<div class="container">
    <div class="postIndex_boardName">
        <h4>{{ $boardName }}</h4>
    </div>
    <article id=postIndex_article>
        <div class="postIndex_postList">
            @if(empty($find) and empty($search))
                @if($boardTypeCode !== '2')
                    <ul class="hoh">
                        <li>&nbsp;</li>
                        <li>제 목</li>
                        <li style="width: 100px;">닉네임</li>
                        <li>작성일</li>
                        <li>조회수</li>
                    </ul>
                @endif
                @forelse($posts as $post)

                    @if($post ->thumbnail == null)
                        <ul>
                            <li>{{ $postNumber = $post->postNumber }}</li>
                            <li>
                                <form method="get" class="postIndex_name" action="{{ route('posts.show', ['boardNumber' => $boardNumber, 'postNumber' => $postNumber]) }}">
                                    <input type="hidden" id="boardTypeCode" name="boardTypeCode" value="<?php echo $boardTypeCode; ?>">
                                    <input type="hidden" id="viewCount" name="viewCount" value="1">
                                    <input type="hidden" id="boardNumber" name="boardNumber" value="<?php echo $boardNumber; ?>">
                                    <input type="hidden" id="postNumber" name="postNumber" value="<?php echo $postNumber; ?>">
                                    <input type="hidden" id="boardName" name="boardName" value="<?php echo $boardName; ?>">
                                    <a href="{{ route('posts.show', ['boardNumber' => $boardNumber, 'postNumber' => $postNumber]) }}">
                                        <button type="submit">
                                            {{$post->postName}}
                                            @if($comment->where('postNumber',$postNumber)->sum('statusValue') !== 0)
                                                [{{ $comment->where('postNumber',$postNumber)->sum('statusValue') }}]
                                            @else
                                            @endif
                                            @if($post->where('postparentNumber',$postNumber)->sum('statusValue') !== 0)
                                                [{{ $post->where('postparentNumber',$postNumber)->sum('statusValue') }}]
                                            @else
                                            @endif
                                        </button>
                                    </a>
                                </form>
                            </li>
                            <li>{{$post->user['nickName']}}</li>
                            <li>{{ $post->created_at->diffForHumans() }}</li>
                            <li>
                                @if($post -> viewCount == 0)
                                0
                                @endif
                                <script>
                                $(document).ready(function(e) {
                                    var winWidth=$(window).width();
                                    if(winWidth<960){
                                        $("p").text("조회 ");
                                    }
                                });
                                </script>

                                <p id="view"></p>{{ $post -> viewCount }}

                            </li>
                        </ul>
                    @else
                        <style>
                        .hoh{display: none;}
                        .serarch_thumbail ul{
                        width:360px;
                        float:left; border-bottom:2px solid #ddd;
                        padding-bottom:17px; margin-bottom:40px;
                        }
                        .postIndex_postList ul{width:360px;}
                        .postIndex_postList ul:first-child li:first-child{width:360px;}
                        .postIndex_postList ul li {
                        min-height: 0;  float:  none;
                        text-align:  none; font-size: none;
                        padding: 0; border-bottom:none;
                        white-space:  none; overflow:  none;
                        }
                        .serarch_thumbail:nth-child(n*2) ul{margin-left:80px;}
                        </style>
                        <div class="displaynone">{{ $postNumber = $post->postNumber  }}</div>
                        <div class="postIndex_thumbnail">
                            <ul>
                                <li>
                                    <div class="thumbnailWrap">
                                        <form method="get" action="{{ route('posts.show', ['boardNumber' => $boardNumber, 'postNumber' => $postNumber]) }}">
                                            <input type="hidden" id="boardTypeCode" name="boardTypeCode" value="<?php echo $boardTypeCode; ?>">
                                            <input type="hidden" id="viewCount" name="viewCount" value="1">
                                            <input type="hidden" id="boardNumber" name="boardNumber" value="<?php echo $boardNumber; ?>">
                                            <input type="hidden" id="postNumber" name="postNumber" value="<?php echo $postNumber; ?>">
                                            <input type="hidden" id="boardName" name="boardName" value="<?php echo $boardName; ?>">
                                            <a href="{{ route('posts.show', ['boardNumber' => $boardNumber, 'postNumber' => $postNumber]) }}"><button type="submit"><img src="/thumbnail/{{$post->thumbnail}}" /></button></a>
                                        </form>
                                    </div>
                                </li>
                                <li style="width:360px;  text-align:left; ">
                                    <a href="{{ route('posts.show', ['boardNumber' => $boardNumber, 'postNumber' => $postNumber]) }}">
                                        {{ $post->postName}}
                                        @if($comment->where('postNumber',$postNumber)->sum('statusValue') !== 0)
                                            [{{ $comment->where('postNumber',$postNumber)->sum('statusValue') }}]
                                        @else
                                        @endif
                                    </a>
                                </li>
                                <li style="text-align:left; margin-left:0;">{{$post->user['nickName']}}</li>
                                <li style=" display: inline;width:360px; text-align:left;"><span>{{ $post->created_at->diffForHumans() }}</span><span>조회{{ $post -> viewCount }}</span></li>
                            </ul>
                        </div>
                    @endif
                @empty
                    <br><p class="text-center text-danger">글이 없습니다.</p>
                @endforelse
            @endif
            @if($boardTypeCode === '2')
                <style>#abs ul li{display:none;}</style>
            @endif
            @if(isset($searchs))
                <div class="postIndex_postList">
                    <ul class="hoh">
                        <li>&nbsp;</li>
                        <li>제 목</li>
                        <li style="width: 100px;">닉네임</li>
                        <li>작성일</li>
                        <li>조회수</li>
                    </ul>
                    @forelse($searchs as $search)
                        @if($search ->thumbnail == null)
                            <ul>
                                <li>{{ $serchPostNumber = $search->postNumber }}</li>
                                <li>
                                    <form method="get" class="postIndex_name" action="{{ route('posts.show', ['boardNumber' => $boardNumber, 'postNumber' => $serchPostNumber]) }}">
                                        <input type="hidden" id="boardTypeCode" name="boardTypeCode" value="<?php echo $boardTypeCode; ?>">
                                        <input type="hidden" id="viewCount" name="viewCount" value="1">
                                        <input type="hidden" id="boardNumber" name="boardNumber" value="<?php echo $boardNumber; ?>">
                                        <input type="hidden" id="postNumber" name="postNumber" value="<?php echo $serchPostNumber; ?>">
                                        <input type="hidden" id="boardName" name="boardName" value="<?php echo $boardName; ?>">
                                        <a href="{{ route('posts.show', ['boardNumber' => $boardNumber, 'postNumber' => $serchPostNumber]) }}">
                                            <button type="submit">
                                                {{$search->postName}}
                                                @if($comment->where('postNumber',$serchPostNumber)->sum('statusValue') !== 0)
                                                    [{{ $comment->where('postNumber',$serchPostNumber)->sum('statusValue') }}]
                                                @else
                                                @endif
                                            </button>
                                        </a>
                                    </form>
                                </li>
                                <li>{{ $search->user['nickName'] }}</li>
                                <li>{{ $search->created_at->diffForHumans() }}</li>
                                <li>
                                    @if($search -> viewCount == 0)
                                    0
                                    @endif
                                    {{ $search -> viewCount }}
                                </li>
                            </ul>
                        @else
                            <style>
                            .hoh{display: none;}
                            .serarch_thumbail ul{
                                width:360px;
                                float:left; border-bottom:2px solid #ddd;
                                padding-bottom:17px; margin-bottom:40px;
                            }
                            .postIndex_postList ul {width:360px;}
                            .postIndex_postList ul:first-child li:first-child{width:360px;}
                            .postIndex_postList ul li {
                                min-height: 0;  float:  none;
                                text-align:  none; font-size: none;
                                padding: 0; border-bottom:none;
                                white-space:  none; overflow:  none;
                            }
                            </style>
                            <div class="displaynone">{{ $postNumber = $search->postNumber}}</div>
                            <div class="postIndex_thumbnail serarch_thumbail">
                                <ul>
                                    <li>
                                        <div class="thumbnailWrap">
                                            <form method="get" action="{{ route('posts.show', ['boardNumber' => $boardNumber, 'postNumber' => $postNumber]) }}">
                                                <input type="hidden" id="boardTypeCode" name="boardTypeCode" value="<?php echo $boardTypeCode; ?>">
                                                <input type="hidden" id="viewCount" name="viewCount" value="1">
                                                <input type="hidden" id="boardNumber" name="boardNumber" value="<?php echo $boardNumber; ?>">
                                                <input type="hidden" id="postNumber" name="postNumber" value="<?php echo $postNumber; ?>">
                                                <input type="hidden" id="boardName" name="boardName" value="<?php echo $boardName; ?>">
                                                <a href="{{ route('posts.show', ['boardNumber' => $boardNumber, 'postNumber' => $postNumber]) }}"><button type="submit"><img src="/thumbnail/{{$search->thumbnail}}" /></button></a>
                                            </form>
                                        </div>
                                    </li>
                                    <li style="width:360px; text-align:left;">
                                        <a href="{{ route('posts.show', ['boardNumber' => $boardNumber, 'postNumber' => $postNumber]) }}">
                                            {{ $search->postName}}
                                            @if($comment->where('postNumber',$postNumber)->sum('statusValue') !== 0)
                                                [{{ $comment->where('postNumber',$postNumber)->sum('statusValue') }}]
                                            @else
                                            @endif
                                        </a>
                                    </li>
                                    <li style="text-align:left; margin-left:0;">{{$search->user['nickName']}}</li>
                                    <li style="width: 180px; text-align: left;"><span>{{ $search->created_at->diffForHumans() }}</span><span>조회{{ $search -> viewCount }}</span></li>
                                </ul>
                            </div>
                        @endif
                    @empty<br><br><br><br>
                        <style>
                        .hoh{display: none;}
                        </style>
                        <h5 style="text-align:center;">검색결과가 없습니다.</h5>
                    @endforelse
                </div>
            @endif
        </div>
        <div class="writeSearch_wrap">
            @if(Auth::user())
                <div class="writeBox">
                    <form method="get" action="{{ route('posts.create', ['boardNumber' => $boardNumber]) }}">
                        <input type="hidden" id="boardTypeCode" name="boardTypeCode" value="<?php echo $boardTypeCode; ?>">
                        <input type="hidden" id="boardNumber" name="boardNumber" value="<?php echo $boardNumber; ?>">
                        <input type="hidden" id="boardTypeCode" name="boardTypeCode" value="<?php echo $boardTypeCode; ?>">
                        <button type="submit" class="btn btn-primary">글 작성하기</button>
                    </form>
                </div>
            @endif
            <div class="searchBox">
                <form method="get" action="{{ route('posts.index', ['boardNumber' => $boardNumber]) }}" role="search">
                    <select name="find" class="custom-select" style="padding-bottom:3px; height:34px; ">
                        <option value="postName">제목</option>
                        <option value="postContent">내용</option>
                        <option value="nickName">닉네임</option>
                    </select>
                    <input type="hidden" name="boardName" value="{{ $boardName }}">
                    <input type="hidden" id="boardTypeCode" name="boardTypeCode" value="<?php echo $boardTypeCode; ?>">
                    <input type="text"  name="search" placeholder="검색" style="height:34px; ">
                    <button type="submit" class="btn btn-primary" >검색</button>
                </form>
            </div>
        </div>
    </article>
    @if(isset($searchs))
        @if($searchs->count())
            <div class="text-center">
                {!! $searchs->appends(Request::except('page'))->render() !!}
            </div>
        @endif
    @else
        <div class="text-center">
            {!! $posts->appends(Request::except('page'))->render() !!}
        </div>
    @endif
</div>
@stop
