@extends('layouts.master')

@section('content')
<style>
    .boardHeader{
        font-size:25px; margin-top:60px; 
        margin-left:220px; margin-bottom:20px;
        font-weight:bold; 
        display:inline-block; padding-bottom:12px;
        border-bottom:5px solid #dedede;
        text-shadow: 0px 1px 1px #dedede;
    }
    .boardMenu {clear:both; width:700px; margin:0 auto;}
    .boardMenu ul li, .boardContent ul li {
        float:left; font-weight: bold;
         color: #fff;
        background-color: deepskyblue; min-height: 44px;
        text-align: center;font-size: 16px;
        padding: 15px 0; 
    }
    .boardMenu ul li:first-child{width:80px; height:52px;}
    .boardMenu ul li:nth-child(2), .boardContent ul li:nth-child(2){width:380px; }
    .boardMenu ul li:nth-child(3), .boardContent ul li:nth-child(3){width:120px; }
    .boardMenu ul li:last-child, .boardContent ul li:last-child{width:120px;}
    .boardContent ul li{
        background-color:inherit; border-bottom: 1px solid #ddd;
        border-top: 1px solid #ddd; color:#1e1e1e; font-weight: normal;
        font-size:16px;
    }
    .boardContent ul li:first-child{width: 80px; height:54px;}
    .boardContent ul {
        clear:both; width:700px; 
        margin:0 auto;}
    .boardContent ul:last-child li{margin-bottom:40px;}
    .text-right{
        clear:both; width:700px;
       
        margin:0 auto; 
    }
</style>
<div class="container">   
    <div class="boardHeader">게시판 관리 </div>
        <div class="boardMenu">
        <ul>
            <li></li>
            <li>게시판</li>
            <li>생성일</li>
            <li>관리</li>
        </ul>
        </div>
        <div class="boardContent">
       
        @forelse($boards as $board)
        
        <ul class="btn-default">
            <li>{{ $board->boardNumber }}</li>
            <li>
            <a href="/boards/{{ $board->boardNumber }}/posts">
                <form method="get" action="{{ route('posts.index', ['boardNumber' => $board->boardNumber]) }}">
                    <input type="hidden" id="boardTypeCode" name="boardTypeCode" value="{{$board->boardTypeCode}}">
                    <input type="hidden" id="boardNumber" name="boardNumber" value="{{$board->boardNumber}}">
                    <input type="hidden" id="boardName" name="boardName" value="{{$board->boardName}}">
                    <button type="submit">{{ $board->boardName }}</button>
                </form>
            </a>
            </li>    
            <li>{{ $board->created_at->diffForHumans() }}</li>
            <li>
            <a href="/board/{{ $board->boardNumber }}" style="color:coral;">
                <form method="get" action="{{ route('boards.show', ['boardNumber' => $board->boardNumber]) }}">
                    <input type="hidden" id="boardTypeCode" name="boardTypeCode" value="{{$board->boardTypeCode}}">
                    <input type="hidden" id="boardNumber" name="boardNumber" value="{{$board->boardNumber}}">
                    <input type="hidden" id="boardName" name="boardName" value="{{$board->boardName}}">
                    <button type="submit">게시판 관리</button>
                </form>
            </a>
             
        </ul>    
        @empty
            <p class="text-center text-danger">게시판이 없습니다.</p>
        @endforelse
        </div>
        <div class="text-right">
            <a href="{{ route('boards.create') }}" class="btn btn-primary">게시판 만들기</a>
        </div>
</div>
@stop