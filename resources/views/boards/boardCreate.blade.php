@extends('layouts.master')
@section('script')
	<link href="{{ asset('/css/boardSetting.css') }}" rel="stylesheet" type="text/css" >
    <script>
    function doOpenCheck(chk){
        var obj = document.getElementsByName("boardTypeCode");
        for(var i=0; i<obj.length; i++){
            if(obj[i] != chk){
                obj[i].checked = false;
            }
        }
    }
    </script>
@endsection

@section('content')
<div class="container">
    <div class="m_notice">
        <span>게시판 생성</span>
    </div>
        <h1 id="board_create">게시판 생성</h1>
<form method="post" action="{{ route('boards.store') }}" >
      {!! csrf_field() !!}

        <div class="form-group {{ $errors->has('boardName') ? 'has-error' : '' }}">
            {{-- <label for="boardName">게시판명</label> --}}
            <input type="text" name="boardName" id="boardName" value="{{ old('boardName') }}" class="form-control"/  placeholder="게시판명">
        </div>
        <div class="form-group form-group2">
            <input type="checkbox" id="boardTypeCode" name="boardTypeCode" value="1" onclick="doOpenCheck(this);" checked>
            <label for="boardTypeCode"><span>일반형</span></label>
            <input type="checkbox" id="boardTypeCode" name="boardTypeCode" value="2" onclick="doOpenCheck(this);">
            <label for="boardTypeCode"><span>갤러리형</span></label>
            <input type="checkbox" id="boardTypeCode" name="boardTypeCode" value="3" onclick="doOpenCheck(this);">
            <label for="boardTypeCode"><span>Q&A형</span></label>
        </div>
        <div class="form-group form-group2">
            <button type="submit" class="btn btn-primary">
            생성하기
            </button>
        </div>
  </form>
</div>
  @stop
