@extends('layouts.master')
@section('script')
	{{-- <script type="text/javascript" src="{!! asset('js/publish.js') !!}"></script> --}}
	<link href="{{ asset('/css/boardSetting.css') }}" rel="stylesheet" type="text/css" >
@endsection
@section('content')

<div class="container">

        <div class="postIndex_boardName">
            <h4>{{ $boardName }}</h4>
        </div>
        <div class="m_notice">
            <span>{{ $boardName }}</span>
        </div>
        <div class="boardWrap">
        <div class="text-center action__post">
            <a href="{{ route('boards.index')}}" class="btn btn-default">
                게시판 목록
            </a>
            <a>
                <form method="get" action="{{route('board.edit', ['boardNumber' => $boardNumber])}}" style="display: inline;">
                    {!! csrf_field() !!}
                    <input type="hidden" name="boardNumber" value="{{$boardNumber}}">
                    <input type="hidden" name="boardName" value="{{$boardName}}">
                    <button class="btn btn-info" type="submit">게시판명 수정</button>
                </form>
            </a>
        </div>
            <!-- <form method="get" action="{{ route('board.delete', ['boardNumber' => $boardNumber])}}" style="display: inline;">
                   {!! csrf_field() !!}
                    <input type="hidden" name="boardNumber" value="{{$boardNumber}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="delete"> -->
                    <button id="budelete" class="btn btn-primary" type="submit">삭제(게시판 삭제 당해서 미작동)</button>
            </form>
    </div>
</div>
@stop
