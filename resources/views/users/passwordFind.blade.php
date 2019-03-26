
@extends('layouts.master')
<style>
    .wrap{display:none;}
</style>
<script src="//code.jquery.com/jquery.min.js"></script>
@section('content')
<script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
</script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<link href="{{ asset('/css/users.css') }}" rel="stylesheet" type="text/css" >
<body style="background-color:gainsboro;">
<div class="register_wrap">
    <a href="/home/"><img src="/images/logo.png"></a>
    <form method="post" action="{{ route('users.passwordFind') }}" onsubmit="return tocheckpw1()" class="register_form">
       {!! csrf_field() !!}
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="" style="margin-top :50px;">
            <label >아이디</label>
            <input type="text" name="userId" id="userId" value="{{ old('userId')}}" class="form-control"/>
            @if ($errors->has('userId'))
                <span class="invalid-feedback" role="alert">
                    <strong class="requireMessage">{{ $errors->first('userId') }}</strong>
                </span>
            @endif
        </div>
        <div class="">
            <label>이름</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control"/>
            @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong class="requireMessage">{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
        <div class="">
            <label>이메일</label>
            <input type="text" name="email" value="{{ old('email') }}" class="form-control"/ >
            @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong class="requireMessage">{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group" style="margin-bottom:10px;">
            <input type="submit" value="비밀번호 찾기" class="btn btn-primary register_sumit">
        </div>
            <a href="/" class="btn btn-primary register_cancle">뒤로가기</a>
    </form>
</div>
</body>
</html>
@stop
