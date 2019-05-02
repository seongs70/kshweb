@extends('layouts.master')
<style>
    .postIndex_boardName h4{
        font-size:25px; margin-top:60px; 
        margin-left:200px; margin-bottom:20px;
        font-weight:bold; display:inline-block; 
        padding-bottom:12px; border-bottom:5px solid #dedede;
        text-shadow: 0px 1px 1px #dedede;
    }
    .text-center {display:inline-block; margin-right:30px;}

    .boardWrap{margin-left:200px; margin-top:50px;}
</style>

@section('content')

<div class="container">
    
        <div class="postIndex_boardName">
            <h4>{{ $boardName }}</h4>
        </div>
        <div class="boardWrap">
        <div class="text-center action__post">
            <a href="{{ route('boards.index')}}" class="btn btn-default">
                게시판 목록
            </a>
            <a style="margin-left:30px; margin-right:0;">
                <form method="get" action="{{route('board.edit', ['boardNumber' => $boardNumber])}}" style="display: inline;">
                    {!! csrf_field() !!}
                    <input type="hidden" name="boardNumber" value="{{$boardNumber}}">
                    <input type="hidden" name="boardName" value="{{$boardName}}">
                    <button class="btn btn-info" type="submit">게시판명 수정</button>
                </form>   
            </a>
        </div>
            <form method="get" action="{{ route('board.delete', ['boardNumber' => $boardNumber])}}" style="display: inline;">
                   {!! csrf_field() !!}
                    <input type="hidden" name="boardNumber" value="{{$boardNumber}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="delete">
                    <button class="btn btn-primary" type="submit">게시판 삭제</button>
            </form>
    </div>  
</div>    
@stop




