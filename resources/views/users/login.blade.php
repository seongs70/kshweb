@extends('layouts.master')
<style>
    .wrap{display:none;}
</style>
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<link href="{{ asset('/css/users.css') }}" rel="stylesheet" type="text/css" >
<script type="text/javascript">
    function tocheckpw1() {
        var pw = document.getElementById("password").value;
        var pwck = document.getElementById("password_confirmation").value;
        if (pw != pwck) {
            alert('비밀번호가 일치하지 않습니다. 다시 입력해 주세요');
            return false;
        }
    }
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
</script>
</html>
<body style="background-color:gainsboro;">
<div class="register_wrap">
    <div class="logo">
        <a href="/home/"><img src="/images/logo.png"></a>
    </div>
    <form method="post" action="{{ route('users.loginStore') }}" onsubmit="return tocheckpw1()" class="register_form">
       {!! csrf_field() !!}
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="">
            <label>아이디</label>
            <input type="text" name="userId" id="userId" value="admin" class="form-control"/>
            @if ($errors->has('userId'))
                <span class="invalid-feedback" role="alert">
                    <strong class="requireMessage">{{ $errors->first('userId') }}</strong>
                </span>
            @endif
        </div>
        <div class="" {{ $errors->has('password') ? 'has-error' : '' }}>
            <label>패스워드</label>
            <input type="password" name="password" id="password" value="123456" class="form-control"/>
            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong class="requireMessage">{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
        <div class="" {{ $errors->has('password') ? 'has-error' : '' }}>
            <label>패스워드 확인</label>
            <input type="password" name="password_confirmation" id="password_confirmation" value="123456" class="form-control"/>
        </div>
        <div class="form-group" style="margin-bottom:10px;">
            <input type="submit" value="로그인" class="btn btn-primary register_sumit">
        </div>
            <a href="/" class="btn btn-primary register_cancle">뒤로가기</a>

    </form>
</div>
</body>
@stop
