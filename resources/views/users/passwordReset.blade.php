@extends('layouts.master')
<style>
    .wrap{display:none;}
</style>
@section('content')

<link href="{{ asset('/css/users.css') }}" rel="stylesheet" type="text/css" >
<script src="//code.jquery.com/jquery.min.js"></script>
<script type="text/javascript">
    function tocheckpw1() {
        var pw = document.getElementById("password").value;
        var pwck = document.getElementById("password_confirmation").value;
        if (pw != pwck) {
            alert('비밀번호가 일치하지 않습니다. 다시 입력해 주세요');
            return false;
        }
    }
    
</script>
<body style="background-color:gainsboro;">
    <div class="register_wrap">
    <a href="/home/"><img src="/images/logo.png"></a>
        <form method="post" action="{{ route('users.passwordFindUpdate') }}" onsubmit="return tocheckpw1()" class="register_form">
           {!! csrf_field() !!}
            <input type="hidden" name="userId" value="<?php echo $user?>">
            <div class="btn btn-primary register_cancle" style="background-color:#1e1e1e; margin-top:50px; margin-bottom:20px; font-size:18px;height: 50px; cursor:default">
                <?php echo $user ?>
            </div>
            <div class="" {{ $errors->has('password') ? 'has-error' : '' }}>
                <label>패스워드</label>
                <input type="password" name="password" id="password" value="" class="form-control"/>
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong class="requireMessage">{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="" {{ $errors->has('password') ? 'has-error' : '' }}>
                <label>패스워드 확인</label>
                <input type="password" name="password_confirmation" id="password_confirmation" value="" class="form-control"/>
            </div>
            <div class="form-group" style="margin-bottom:10px;">
                <input type="submit" value="비밀번호 변경" class="btn btn-primary register_sumit">
            </div>
                <a href="/" class="btn btn-primary register_cancle"> 취소하기</a>
        </form>
    </div>    
</body>
@stop
