@extends('layouts.master')


@section('content')
<div class="container">
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
<style>

</style>
<div class="container">
    <h1>게시판 생성</h1>
</div>
<form method="post" action="{{ route('boards.store') }}" >
      {!! csrf_field() !!}
      
        <div class="form-group {{ $errors->has('boardName') ? 'has-error' : '' }}">
            <label for="boardName">게시판명</label>
            <input type="text" name="boardName" id="boardName" value="{{ old('boardName') }}" class="form-control"/ style="width:200px;">
        </div>
        <div class="form-group">           
            <input type="checkbox" id="boardTypeCode" name="boardTypeCode" value="1" onclick="doOpenCheck(this);" checked>
            <label for="boardTypeCode"><span>일반형</span></label>
            <input type="checkbox" id="boardTypeCode" name="boardTypeCode" value="2" onclick="doOpenCheck(this);">
            <label for="boardTypeCode"><span>갤러리형</span></label>
            <input type="checkbox" id="boardTypeCode" name="boardTypeCode" value="3" onclick="doOpenCheck(this);">
            <label for="boardTypeCode"><span>Q&A형</span></label>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">
            저장하기
            </button>
        </div>
  </form>
</div>  
  @stop