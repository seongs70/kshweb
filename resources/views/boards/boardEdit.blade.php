@extends('layouts.master')
@section('script')
	{{-- <script type="text/javascript" src="{!! asset('js/publish.js') !!}"></script> --}}
	<link href="{{ asset('/css/boardSetting.css') }}" rel="stylesheet" type="text/css" >
@endsection
@section('content')

<div class="container">
    <div class="m_notice">
        <span>{{ $boardName }}</span>
    </div>
   <div class="editWrap">
        <div class="page-header">
           <h4>{{ $boardName }}</h4>
        </div>
        <form action="{{ route('board.update', ['boardNumber'=> $boardNumber]) }}" method="post">
            {!! csrf_field() !!}

        <label for="title" style="margin-bottom:12px;" id="title_label">게시판명</label>
        <input type="hidden" name="boardNumber" value="{{$boardNumber}}">
        <input type="text" name="boardName" id="boardName" class="form-control" value="{{ old('boardName', $boardName) }}">
            {!! $errors->first('boardName', '<span class="form-error">:message</span>') !!}
            <button class="btn btn-primary" id="btn-primary">수정하기</button>
        </form>
    </div>
</div>
@stop
