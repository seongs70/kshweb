@extends('layouts.master')
<!DOCTYPE html>
@section('stylesheet')
@endsection
@section('script')
  <script type="text/javascript" src="{!! asset('js/home.js') !!}"></script>
  <script>
      var msg = '{{Session::get('alert')}}';
      var exist = '{{Session::has('alert')}}';
      if(exist){alert(msg);};
  </script>
  <link href="{{ asset('/css/home.css') }}" rel="stylesheet" type="text/css" >
@endsection
@section('content')
<div class="slideshow">
    <ul>
        <li><img src="images/background1.jpg"><a class="btn btn-default git" href="https://github.com/seongs70/kshweb"target="_blank">코드 확인</a>
        </li>
        <li><a href="http://user156.dothome.co.kr/html/"target="_blank"><img src="images/background2.jpg">
            </a>
        </li>
        <li><a href="http://115.68.220.209:8000/boards/8/posts"><img src="images/background3.jpg">
            </a>
        </li>
    </ul>
    <nav class="slidenav">
        <button class="slidenav__item slidenav__item--prev"></button>
        <button class="slidenav__item slidenav__item--next"></button>
    </nav>
</div>
<div class="main1">
    <ul>
        <a href="http://dynamite156.dothome.co.kr/"target="_blank"><li></li></a>
        <a href="http://user3763.dothome.co.kr/"target="_blank"><li></li></a>
        <a href="http://user156.dothome.co.kr/html/sub1.html"target="_blank"><li></li></a>
    </ul>
</div>
<div class="main2">
    <ul>
        <li><a href="http://dynamite156.dothome.co.kr/"target="_blank">참치집 Web</a></li>
        <li><a href="http://user3763.dothome.co.kr/"target="_blank">피규어 Web</a></li>
        <li><a href="http://user156.dothome.co.kr/html/sub1.html"target="_blank">채식 Web</a></li>
    </ul>
</div>
<div class="bg3">
    <div class="bg3_1">
        <ul>
            <li><img src="images/boardicon1.png" alt="boardicon"><h3>Free</h3></li>
            <li><img src="images/boardicon2.png" alt="boardicon"><h3>Gallery</h3></li>
            <li><img src="images/boardicon3.png" alt="boardicon"><h3>Q&A</h3></li>
        </ul>
        <ul>
            <li>게시판 생성 및 관리</li>
            <li>3Type (자유, 갤러리, Q&A)</li>
            <a href="http://115.68.220.209:8000/boards/"><li class="btn btn-default">바로가기</li></a>
        </ul>
    </div>
</div>
<div class="bg2">
</div>
<div class="bg_01">
    <a href="http://115.68.220.209:8000/board/profile">
    <div class="hover panel">
        <div class="front">
            <div class="pad">
            </div>
        </div>
        <div class="back">
            <div class="pad">
            </div>
        </div>
    </div>
    <h1>Profile</h1>
    </a>
</div>
<a href="http://115.68.220.209:8000/auth/login"><div class="main3"></div></a>
<div class="main4">
    <ul>
      <li></li>
      <li></li>
    </ul>
</div>
<footer>Copyright ⓒKimSH. All rights reserved by 2018. </footer>
@endsection
