@extends('layouts.master')
<style>
    .postIndex_boardName h4{
        font-size:25px; margin-top:60px; 
        margin-left:200px; margin-bottom:20px;
        font-weight:bold; display:inline-block; 
        padding-bottom:12px; border-bottom:5px solid #dedede;
        text-shadow: 0px 1px 1px #dedede;
    }
    .text-center {display:inline-block;}
    .text-center a {margin-right:30px;}    
    .boardWrap{margin-left:200px; margin-top:50px;}
</style>

@section('content')

<div class="container">
    
        <div class="postIndex_boardName">
            <h4>{{ $board->boardName }}</h4>
        </div>
        <div class="boardWrap">
        <div class="text-center action__post">
            <a href="{{ route('boards.index')}}" class="btn btn-default">
                게시판 목록
            </a>
            @can('update', $board)
             <a href="{{ route('boards.edit', $board->boardNumber) }}" class="btn btn-info">
                게시판명 수정
            </a>   
            @endcan
            
        </div>
        <form method="post" action="{{ route('boards.destroy', $board->boardNumber) }}" style="display: inline;">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="delete">
                @can('delete', $board)
                    <button class="btn btn-primary" type="submit">게시판 삭제</button>
                @endcan
        </form>
    </div>  
</div>    
@stop




