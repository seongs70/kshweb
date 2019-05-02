@extends('layouts.master')
<style>
    .page-header h4 {color:#aaa; font-size:22px;}
    .btn-primary {margin:30px 0; float:right;}
    .editWrap{width:300px; margin:0 auto; margin-left:150px;}
</style>
@section('content')

<div class="container">
   <div class="editWrap">
        <div class="page-header">
           <h4>{{ $boardName }}</h4>
        </div>
        <form action="{{ route('board.update', ['boardNumber'=> $boardNumber]) }}" method="post">
            {!! csrf_field() !!}
       
        <label for="title" style="margin-bottom:12px;">게시판명</label>
        <input type="hidden" name="boardNumber" value="{{$boardNumber}}">
        <input type="text" name="boardName" id="boardName" class="form-control" value="{{ old('boardName', $boardName) }}">
            {!! $errors->first('boardName', '<span class="form-error">:message</span>') !!}
            <button class="btn btn-primary">수정하기</button>
        </form>
    </div>
</div>    
@stop