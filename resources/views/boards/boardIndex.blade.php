@extends('layouts.master')
@section('script')
	{{-- <script type="text/javascript" src="{!! asset('js/publish.js') !!}"></script> --}}
	<link href="{{ asset('/css/boardSetting.css') }}" rel="stylesheet" type="text/css" >
@endsection
@section('content')

<div class="container">
    <div class="m_notice">
        <span>게시판 관리</span>
    </div>
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
                {{ $board->boardName }}
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
		@foreach ($boards as $board)
			{{$board->name}}
		@endforeach
		{{ $boards->links() }}
</div>


@stop
