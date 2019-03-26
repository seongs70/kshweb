@extends('layouts.master')

<!DOCTYPE html>
@section('stylesheet')

@section('script')

@endsection

@section('style')
<style>
section #a4 .rope{
	margin:0 auto;
	width:1075px; height:120px;
	background-image:url(/images/rope.png); background-size:cover;
	
}
section #a4 .gallery_frame{
	margin:0 auto; margin-top:70px;
    margin-bottom:70px;
	width:1075px; height:775px; 
}
section #a4 .gallery_tap_title_wrap{
	width:100%; margin:0 auto;
	margin-top:25px; clear:both;
}
section #a4 .gallery_tap_title_wrap ul {
	width:481px; height:40px; margin:0 auto;
	z-index:9999; margin-bottom:40px;
}
section #a4 .gallery_tap_title_wrap ul li{
	position:relative;
	width:240px; height:47px;
	margin:0 auto; padding-top:11px;
	float:left; border-right:1px solid #ddd;
	background-color:#aaa; transition:all 0.3s;
    text-align: center;
    box-shadow: 0 1px 10px 0 rgba(0,0,0,.15);
}

section #a4 .gallery_tap_title_wrap ul li:last-child{border-right:none;}
.gallery_tap_title_wrap ul li a{
	font-size:18px; color:beige; letter-spacing:5px;
	font-weight:100;  font-family: 'Noto Sans KR', sans-serif;
	text-align:center;
}
section #a4 .gallery_tap_title_wrap ul li:hover {background-color:#fff;}
section #a4 .gallery_tap_title_wrap ul li:hover a{color:lightslategray;}
section #a4 .gallery_tap_wrap {
	clear:both;
	width:100%; margin:0 auto;
}
section #a4 .gallery_tap_wrap ul{
	width:1000px; 
	margin:0 auto;
}
section #a4 .gallery_tap_wrap ul li {
	float:left;	height:300px;
	width:220px; margin:0 40px 40px 0; 
	background-size:cover;	background-repeat:no-repeat;
	background-position:center; cursor:pointer;
    box-shadow: 0 1px 10px 0 rgba(0,0,0,.15);
}
section #a4 .gallery_tap_wrap ul li:nth-child(4), section #a4 .gallery_tap_wrap ul li:last-child{margin-right:0;}
section #a4 .gallery_tap_wrap ul li:hover {
	opacity:0.9; transition:all 0.5s;
       transform:scale(1.03); 
}
/*포스터*/
section #a4 .gallery_tap_wrap ul:first-child li:first-child{background-image:url(/images/lsc_small.jpg); }
section #a4 .gallery_tap_wrap ul:first-child li:nth-child(2){background-image:url(/images/poster_dc1.jpg);}
section #a4 .gallery_tap_wrap ul:first-child li:nth-child(3){background-image:url(/images/Sting_small.jpg); }
section #a4 .gallery_tap_wrap ul:first-child li:nth-child(4){background-image:url(/images/poster_marvel1.jpg); }
section #a4 .gallery_tap_wrap ul:first-child li:nth-child(5){background-image:url(/images/card_tuna1.jpg);}
section #a4 .gallery_tap_wrap ul:first-child li:nth-child(6){background-image:url(/images/card_sh.png); background-color:khaki;}
section #a4 .gallery_tap_wrap ul:first-child li:nth-child(7){background-image:url(/images/card_logo2.png); background-color:aliceblue;}
section #a4 .gallery_tap_wrap ul:first-child li:nth-child(8){background-image:url(/images/card_logo1.png); background-color:antiquewhite;}
/*로고, 명함*/
section #a4 .gallery_tap_wrap ul:nth-child(2) li:first-child{background-image:url(/images/lonely_front.png);}
section #a4 .gallery_tap_wrap ul:nth-child(2) li:nth-child(2){background-image:url(/images/lonely_back.png); background-color:#fef8eb;}
section #a4 .gallery_tap_wrap ul:nth-child(2) li:nth-child(3){background-image:url(/images/eat_book2.png); background-color: mistyrose;}
section #a4 .gallery_tap_wrap ul:nth-child(2) li:nth-child(4){background-image:url(/images/eat_back.png); background-color: mistyrose; }
section #a4 .gallery_tap_wrap ul:nth-child(2) li:nth-child(5){background-image:url(/images/beethoven_front.png); background-color:blanchedalmond;}
section #a4 .gallery_tap_wrap ul:nth-child(2) li:nth-child(6){background-image:url(/images/beethoven_back.png); background-color:blanchedalmond;}
section #a4 .gallery_tap_wrap ul:nth-child(2) li:nth-child(7){background-image:url(/images/anti-front.png);}
section #a4 .gallery_tap_wrap ul:nth-child(2) li:nth-child(8){background-image:url(/images/anti-back.png); background-color:#231f20;}
section #a4 .gallery_popup{
	position:fixed; display:none;
	width:100%; height:100%;
	top:0; left:0;
	bottom:0; right:0;
	text-align:center; z-index:50;
	background-color:rgba(0,0,0,1);
}
section #a4 .gallery_popupImage{
	width:588px; margin:0 auto;
	margin-top:48px;
}
section #a4 .gallery_popup a{
	position:absolute ;z-index:51;
	width:70px; height:40px;
}
section #a4 .gallery_popup a.gallery_close{
	top:8%; right:17%;
}
section #a4 .gallery_popup a.gallery_close img{width:80%;}
section #a4 .gallery_popup a.gallery_left1, section #a4 .gallery_popup a.gallery_left2, section #a4 .gallery_popup a.gallery_left3{
	width:70px; margin-top:-125px;
	top:58%; left:11%;
}
section #a4 .gallery_popup a.gallery_right1, section #a4 .gallery_popup a.gallery_right2, section #a4 .gallery_popup a.gallery_right3{
	width:70px; margin-top:-125px;
	top:58%; right:11%;
}
    .gallery_frame{
        border: 2px solid #eee; box-shadow: 0 1px 3px 0 rgba(0,0,0,.15);
    }
</style>
@endsection
@section('content')
<section>
<article id="a4">
    <div class="rope">
    </div>
    <div class="gallery_frame">
        <div class="gallery_tap_title_wrap">
            <ul>
                <li class="gallery_tap_title is2"><a href="#"># 편집디자인</a></li>
                <li class="gallery_tap_title is3"><a href="#"># 리플렛, 북커버</a></li>
            </ul>	
       </div>
       <div class="gallery_tap_wrap">
            <ul>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
            <ul>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
       </div>
       <div class="gallery_popup">
            <a href="#" class="gallery_close"><img src="/images/popup_close.png" alt="close"></a>
            <a href="#" class="gallery_left1"><img src="/images/arrow-left.png" alt="left"></a>
            <a href="#" class="gallery_left2"><img src="/images/arrow-left.png" alt="left"></a>
            <a href="#" class="gallery_right1"><img src="/images/arrow-right.png" alt="right"></a>
            <a href="#" class="gallery_right2"><img src="/images/arrow-right.png" alt="right"></a>
            <div class="gallery_popupImage">
            </div>
       </div>
    </div>       
</article>
</section>
<script>
$('.gallery_tap_title_wrap').find('a').click(function(e){
		e.preventDefault();
	});
	$('.gallery_tap_wrap ul').hide();
	$('.gallery_tap_wrap ul:first-child').show();
	//ul li에 클릭 이벤트 설정
	$('.gallery_tap_title_wrap ul li').click(function(){
	//클릭한 li의 인덱스 번호를 num변수에 저장
	//this : 클릭된 객체 li 가리킴
	var num=$(this).index();
	//.content안의 div객체의 개수만큼 반복
	$('.gallery_tap_wrap > ul').each(function(){
		//.content안의 div 객체의 인덱스 번호를 bunho변수에 저장
		var bunho=$(this).index();
		//만약 bunho와 num값이 같다면
		if(bunho==num){
			//모든 div 숨김
				$('.gallery_tap_wrap > ul').hide();
			//bunho에 해당하는 div 나타남
				$(this).fadeIn(-1);	
			}
		});
	});
	var gall_imgNum=0;
	var gall_popup=$('.gallery_popup');
	var gall_imgLen1=$('.gallery_tap_wrap ul:first-child li').length;
	var gall_imgLen2=$('.gallery_tap_wrap ul:last-child li').length;
	var gall_popupImg=gall_popup.find('.gallery_popupImage');
	$('.gallery_popup').find('a').click(function(e){
		e.preventDefault()
	});
    $('.gallery_tap_wrap ul:first-child li').click(function(){
		$('.gallery_popupImage').stop().css('width',588);
		$('.gallery_popupImage').stop().css('margin-top',48);	
		gall_imgNum=$(this).index()+1;
		gall_popupImg.empty();
		gall_popup.slideToggle(500);
		gall_popupImg.append('<img src="/images/popup_poster'+gall_imgNum+'.jpg">');	
	});
		$('.gallery_tap_wrap ul:last-child li').click(function(){ 
		$('.gallery_popupImage').stop().css('width',1000);
		$('.gallery_popupImage').stop().css('margin-top',200);		 
		gall_imgNum=$(this).index()+1;
		gall_popupImg.empty();
		gall_popup.slideToggle(500);
		gall_popupImg.append('<img src="/images/popup_card'+gall_imgNum+'.jpg">');
	});
	$('.gallery_popup a.gallery_close').click(function(){
		gall_popup.slideToggle(500);
	});
	$('.gallery_tap_wrap ul:first-child li').click(function(){
		$('.gallery_left2').hide();
		$('.gallery_left1').show();
		$('.gallery_right2').hide();
		$('.gallery_right1').show();
	});
	$('.gallery_tap_wrap ul:last-child li').click(function(){
		$('.gallery_left2').show();
		$('.gallery_left1').hide();
		$('.gallery_right2').show();
		$('.gallery_right1').hide();
	});
	$('.gallery_popup a.gallery_right1').click(function(){
		gall_imgNum++;
		if(gall_imgNum>gall_imgLen1){
			gall_imgNum=1;
		}
		gall_popupImg.empty();
		gall_popupImg.append('<img src="/images/popup_poster'+gall_imgNum+'.jpg">');
	});
	$('.gallery_popup a.gallery_right2').click(function(){
		gall_imgNum++;
		if(gall_imgNum>gall_imgLen2){
			gall_imgNum=1;
		}
		gall_popupImg.empty();
		gall_popupImg.append('<img src="/images/popup_card'+gall_imgNum+'.jpg">');
	});
	$('.gallery_popup a.gallery_left1').click(function(){
		gall_imgNum--;
		if(gall_imgNum<=0){
			gall_imgNum=gall_imgLen1;
		}
		gall_popupImg.empty();
		gall_popupImg.append('<img src="/images/popup_poster'+gall_imgNum+'.jpg">');
	});
	$('.gallery_popup a.gallery_left2').click(function(){
		gall_imgNum--;
		if(gall_imgNum<=0){
			gall_imgNum=gall_imgLen2;
		}
		gall_popupImg.empty();
		gall_popupImg.append('<img src="/images/popup_card'+gall_imgNum+'.jpg">');
	});
</script>
@endsection
