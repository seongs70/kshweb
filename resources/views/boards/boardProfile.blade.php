@extends('layouts.master')


<!DOCTYPE html>
@section('stylesheet')

@section('script')

@endsection

@section('style')
<style>
section #a2 {width:100%;}
section #a2 .introduce_wrap1{
	position:absolute; width:100%; height:1000px;
	float:left; padding-top:15%; background-color:deepskyblue;
}
section #a2 .introduce_wrap2 {
	width:50%; height:1000px;
	float:right; padding-top:7.5vw;
	background-color:beige;	
	}
section #a2 .introduce_wrap1 .introduce1{
	margin:0 auto;	
	width:9vw; height:9vw;
	background-image:url(/images/me1.png);
	background-size:cover; cursor:pointer;
}
section #a2 h2{
	width:10vw; margin:0 auto; 
	font-weight:100; color:beige;
	border-bottom:0.1vw solid beige; padding-bottom:1vw;
	margin-top:3vw;	font-size:2vw;
	font-family: 'Jeju Gothic', serif; font-weight:100;
	cursor:pointer; text-align: center;
}
section #a2 h4{
	margin-top:0vw; padding-top:1vw;
	font-size:1.5vw; font-weight:100;
	color:beige; border-bottom:none;
	 cursor:pointer; text-align: center;
}
section #a2 .introduce_wrap2 .introduce2, .skillbar_wrap_all{
	width:50%; height:16vw;
    float:left;
}
    .introduce_wrap2{padding-left: 10%;}
section #a2 .introduce_wrap2 .introduce2 h3{text-align:left;
padding-bottom:0.6vw; font-size:1.2vw; color:#f57023;}
section #a2 .introduce_wrap2 .introduce2 ul li {
	text-align:left; padding:0.2vw 0; font-weight:100;
	font-size:15px; color:lightslategray;}
section #a2 .introduce_wrap2 .introduce2 ul li span{
	width:2vw; display:inline-block;
	padding-right:3vw;	
}
section #a2 .profile_arrow { 
	width:70px; height:29px;
	position:absolute; top:30%; left:40%;
	display:none; z-index:10000;
	cursor:pointer;
}
    .able {text-align: center;
    padding-bottom: 0.6vw;
    font-size: 1.2vw;
    color: #f57023}
    .able span{margin-bottom:140px;}
    .ableUl li {
        width:150px; height:150px;
        float:left; border-radius: 100%;
        margin:33px; 
    }
    .ableUl li img{width:150px; height:150px;}
</style>
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
</article>
</section>
<script>
    $('.introduce_wrap1').click(function(){
        $('.introduce_wrap1').animate({'width':'50%'},800);
        $('.introduce_wrap2').fadeIn(800);
        $('.profile_arrow').fadeIn(800);
        $('.skillbar').each(function(){
            $(this).find('.skillbar-bar').animate({
                width:jQuery(this).attr('data-percent')
            },3000);
        });
    });
    $('.profile_arrow').click(function(){
        $('.introduce_wrap1').animate({'width':'100%'},1000);
        $('.introduce_wrap2').fadeOut(500);
        $('.profile_arrow').fadeOut(500);
        $('.skillbar').each(function(){
            $(this).find('.skillbar-bar').stop().css('width',0);
        });
    });
</script>
@endsection
