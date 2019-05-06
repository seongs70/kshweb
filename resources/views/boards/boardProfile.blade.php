@extends('layouts.master')


<!DOCTYPE html>
@section('stylesheet')

@section('script')
<script type="text/javascript" src="{!! asset('js/publish.js') !!}"></script>
<link href="{{ asset('/css/publish.css') }}" rel="stylesheet" type="text/css" >
@endsection

@section('content')
<section>
<article id="a2">
    <div class="introduce_wrap1">
        <div class="introduce1"></div>
                <h2 style="font-family: 'Nanum Gothic Coding', serif;">김성훈</h2>
                <h4>Click</h4>
    </div><!--introduce_wrap1-->
    <div class="introduce_wrap2">
        <div class="introduce2">
            <h3>Profile</h3>
            <ul class="intro_sub">
                <li><span>name</span>김성훈</li>
                <li><span>birth</span>91년생</li>
                <li><span>phone</span>010. 3763. 5613</li>
                <li><span>email</span>seongs70@naver.com</li>
            </ul>
        </div>
        <div class="introduce2">
            <h3>Education</h3>
            <ul class="intro_sub">
                <li><span>2010.</span>은행고등학교 졸업</li>
                <li><span>2017.</span>대전대 산업광고심리학 졸업</li>
                <li><span>2018.</span>연세직업전문학교 웹개발 수료</li>
            </ul>
        </div>
        <div>
            <span class="able">Available</span><br><br>
            <ul class="ableUl">
                <li><img src="/images/able1.png"></li>
                <li><img src="/images/able2.png"></li>
                <li><img src="/images/able3.png"></li>
                <li><img src="/images/able4.png"></li>
                <li><img src="/images/able5.png"></li>
                <li><img src="/images/able6.png"></li>
            </ul>

        </div>

    </div><!--introduce_wrap2-->
        <div class="profile_arrow"><img src="/images/profile_arrow.png"></div>
	<div class="m_notice"><span>프로필</span></div>	
	<div class="m_profile"></div>
</article>
</section>

@endsection
