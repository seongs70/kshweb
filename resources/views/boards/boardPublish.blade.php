@extends('layouts.master')
<style>
html{    overflow-y: hidden;}
</style>
<!DOCTYPE html>
@section('stylesheet')

@section('script')

@endsection

@section('style')
<style>

section #a3 .web_frame{
	margin:0 auto;	margin-top:155px;
	width:1060px; height:765px;
}
section #a3 .web_gallery {
	width:760px; height:700px; 
	margin:0 auto; padding-top:95px;
}
section #a3 .web_gallery ul li {
	width:240px;  margin:0 auto;
	float:left; margin-right:20px;
	cursor:pointer; position:relative;
    box-shadow: 0 1px 7px 0 rgba(0,0,0,.15);
}  
    section #a3 .web_gallery ul li:hover img{
        transform:scale(1.1); transition:1s;
    }
section #a3 .web_gallery ul li img {position:absolute; left:50%; top:50%;}
section #a3 .web_gallery ul li:nth-child(3), #a3 .web_gallery ul li:last-child{margin-right:0;}
section #a3 .web_gallery ul li div {width:320px; margin-bottom:20px;}
section #a3 .web_gallery ul li:first-child {
	padding-top:130px;height:257px; background-color:#FFEC94;}
section #a3 .web_gallery ul li:first-child img {
    width:50%; margin-left:-60px; margin-top:-50.5px;
    }
section #a3 .web_gallery ul li:nth-child(2){
	padding-top:70.5px;height:202.5px; background-color:#B4D8E7;}
section #a3 .web_gallery ul li:nth-child(2) img {
    margin-left:-40.5px; margin-top:-40.5px;;
    width:34%;
    }
section #a3 .web_gallery ul li:nth-child(3) {
	padding-top:78.5px;height:271.5px; background-color:#FFAEAE;
    margin-bottom:20px;}
section #a3 .web_gallery ul li:nth-child(3) img {
    margin-left:-100.5px; margin-top:-67.5px;
    width:84%;}
section #a3 .web_gallery ul li:nth-child(4) {
	clear:both; margin-top:-14px;
	padding-top:99.5px;height:227.5px; background-color:#56BAEC;}
section #a3 .web_gallery ul li:nth-child(4) img {
    margin-left:-44px; margin-top:-45px;
    width:37%;}
    
section #a3 .web_gallery ul li:nth-child(5){
	margin-top:-69px;
	padding-top:151.5px;height:282.5px; background-color:#B0E57C;}
section #a3 .web_gallery ul li:nth-child(5) img {
    margin-left:-28.5px; margin-top:-39px;
    width:24%;}
section #a3 .web_gallery ul li:last-child{
	padding-top:127.5px;height:209.5px; background-color:bisque;}
section #a3 .web_gallery ul li:last-child img {
    margin-left:-54px; margin-top:-30.5px;
    width:45%;}
section #a3 .web_popup_wrap{
position:absolute; 
left:50%; margin-left:-350px;
}
section #a3 .web_popup_one{position:relative;
	width:1000px; height:731px;}
section #a3 .web_popup{	
background-color:#fff; 
width:700px; margin:0 auto;
 position:absolute;
}
section #a3 .web_popup ul li{margin:0 auto;}
section #a3 .web_popup ul li:nth-child(2){
    margin:-10px 0 0 0; border-bottom:2px solid #ffd929;
}
section #a3 .web_popup ul li:nth-child(2) h1 a {
	
	position:static;	display:inline;
	font-size:30px; letter-spacing:0.5px;
	color:darkcyan;	font-weight:500;
	
}
section #a3 .web_popup ul li:nth-child(2) h1 a:hover{color:crimson;}
section #a3 .web_popup ul li:nth-child(3) h2 {
	font-size:15px; letter-spacing:0.1vw;
	color:#000;	font-weight:100;
	margin:30px 0 15px 0;
}
section #a3 .web_popup ul li:nth-child(4) h2 {
		margin:0 auto; display:block;
		font-size: 22px; font-weight: 300;
		color:coral; line-height:33px;
}
section #a3 .web_popup ul li:nth-child(4) a {
	margin:0 auto; font-size:19px; 
	font-weight:600; letter-spacing:2px;
	color:#47a3da; position:static;
	width:inherit; height:inherit;	
	display:inline;
}
section #a3 .web_popup ul li:nth-child(4) a:last-child {color:#47a3da;}
section #a3 .web_popup ul li:nth-child(4) a:hover {color:crimson;}
section #a3 .web_popup ul li:last-child {
	border-bottom:2px solid #ffd929; margin-bottom:30px;
	padding-top:10px;
}
section #a3 .web_popup ul li:last-child h5{
	display:inline-flex;	letter-spacing:1px;
	font-size:14px;	font-weight:400;
	color:crimson; padding-top:10px;
	
}
section #a3 .web_popup ul li:last-child h5:last-child{padding-bottom:40px;}
section #a3 .web_popup ul li:last-child h5 span{color:#000;}
.left_btn, .right_btn{ 
	position:absolute;
	top:50%; margin-top:-35px;
	cursor:pointer; width:70px;
}
.left_btn{left:-25%;}
.right_btn{left:85%;}
.close_btn{
	display:none; position:absolute;
	top:1.5%; right:1.5%;
	width:35px; height:35px;
	cursor:pointer;
}
section #a3 .web_popup ul li:first-child{
	margin:0 auto;height:370px;
	background-size:cover; 
	background-repeat:no-repeat; background-position:center;
	clear:both;
}
section #a3 .web_popup:first-child ul li:first-child{background-image:url(/images/Tuna_web.jpg);}
section #a3 .web_popup:nth-child(2) ul li:first-child{background-image:url(/images/statue_web.jpg);}
section #a3 .web_popup:nth-child(3) ul li:first-child{background-image:url(/images/vegi_web.jpg);}
section #a3 .web_popup:nth-child(4) ul li:first-child{background-image:url(/images/sam_web.jpg);}
section #a3 .web_popup:nth-child(5) ul li:first-child{background-image:url(/images/sc_web.jpg);}
section #a3 .web_popup:nth-child(6) ul li:first-child{background-image:url(/images/sdk_web.jpg);}
section #a3 .popup {
	display:none; position:fixed;
	width:100%; height:100%;
	top:0; left:0;
	bottom:0; right:0;
	text-align:center; z-index:50;
	background-color:rgba(0,0,0,0.8);
}
section #a3 .popup .popupImage {
	width:640px; height:100%; top:50%; left:50%; position:absolute;
	margin:0 auto; margin-top:-390px; margin-left:-350px;
}
section #a3 .popup a {
	position:absolute; width:70px;
	height:40px; z-index:51;
}
section #a3 .popup a.close {
	top:6%; right:22%;	
}
section #a3 .popup a.close img {width:80%;}
section #a3 .popup a.left {
	width:70px; top:58%;
	left:5%; margin-top:-125px;	
}
section #a3 .popup a.right {
	width:70px; top:58%;
	margin-top:-125px; right:5%;	
}
section #a3 .popup a img {width:100%;}
.close{opacity: 1.2;}
    section #a3 .web_popup{display: none;}
</style>
@endsection
@section('content')


<section>
<article id="a3">
    <div class="web_frame">
        <div class="web_gallery">
            <ul>
                <li><img src="/images/Tuna.png"></li>
                <li><img src="/images/statue.png"></li>
                <li><img src="/images/Land.png"></li>
                <li><img src="/images/sam.png"></li>
                <li><img src="/images/sc.png"></li>
                <li><img src="/images/SDK.png"></li>
            </ul>
        </div><!--web_gallery-->    
        <div class="popup">
            <a href="#" class="close"><img src="/images/popup_close.png" alt="close"></a>
            <div class="popupImage">
            </div>
       </div>
        <div class="web_popup_wrap">
            <div class="web_popup_one">
                <div class="web_popup wp1">
                    <ul>
                        <li>
                        </li>
                        <li>
                            <h1><a href="http://dynamite156.dothome.co.kr/"target="_blank">참치한잔</a></h1>
                        </li>
                        <li>
                            <h2>참치회 Web<br>모던한 느낌을 주며 마지막 제작입니다.</h2>
                        </li>
                        <li>
                            <h2> ▶ 메인 페이지( <a href="http://dynamite156.dothome.co.kr/"target="_blank">PC화면</a>&nbsp;&nbsp;
                                <a href="#" onclick="window.open('http://dynamite156.dothome.co.kr/','참치한잔','width=411, height=731, scrollbars=yes'); return false">Mobile화면</a>
                            )</h2>
                            <h2> ▶ 서브 페이지( <a href="http://dynamite156.dothome.co.kr/sub.html"target="_blank">PC화면</a>&nbsp;&nbsp;
                                <a href="#" onclick="window.open('http://dynamite156.dothome.co.kr/sub.html','참치한잔','width=411, height=731, scrollbars=yes'); return false">Mobile화면</a>
                            )</h2>
                        </li>
                        <li>
                           <h5><span>서브페이지</span>:O&nbsp;&nbsp;&nbsp;&nbsp;</h5><h5><span>모바일</span>:O</h5><br>
                            <h5><span>디자인</span>:100%</h5>&nbsp;&nbsp;&nbsp;&nbsp;<h5><span>코딩</span>:92%</h5>&nbsp;&nbsp;&nbsp;&nbsp;<h5><span>도움</span>:8%</h5>                     	
                        </li>
                    </ul>
                </div><!--web_popup wp1-->
                <div class="web_popup wp2">
                    <ul>
                        <li>
                        </li>
                        <li><h1><a href="http://user3763.dothome.co.kr/"target="_blank">스태츄샵</a></h1>
                        </li>
                        <li>
                            <h2>피규어 Web<br>화려한 이미지로 시선을 잡으며 5번째 제작입니다.</h2>
                        </li>
                        <li>
                            <h2> ▶ 메인 페이지( <a href="http://user3763.dothome.co.kr/"target="_blank">PC화면</a>&nbsp;&nbsp;
                                <a href="#" onclick="window.open('http://user3763.dothome.co.kr/','스태츄샵','width=411, height=731, scrollbars=yes'); return false">Mobile화면</a>
                            )</h2>
                            <h2> ▶ 서브 페이지( <a href="http://user3763.dothome.co.kr/sub.html"target="_blank">PC화면</a>&nbsp;&nbsp;
                                <a href="#" onclick="window.open('http://user3763.dothome.co.kr/sub.html','스태츄샵','width=411, height=731, scrollbars=yes'); return false">Mobile화면</a>
                            )</h2>
                            <h2> ▶ 그누보드 페이지( <a href="http://user3763.dothome.co.kr/board.html"target="_blank">PC화면</a>&nbsp;&nbsp;
                                <a href="#" onclick="window.open('http://user3763.dothome.co.kr/board.html','스태츄샵','width=411, height=731, scrollbars=yes'); return false">Mobile화면</a>
                        )</h2>
                        </li>
                        <li>
                            <h5><span>서브페이지</span>:O</h5>&nbsp;&nbsp;&nbsp;&nbsp;<h5><span>모바일</span>:O</h5>&nbsp;&nbsp;&nbsp;&nbsp;<h5><span>그누보드</span>:O</h5><br>
                            <h5><span>디자인</span>:100%</h5>&nbsp;&nbsp;&nbsp;&nbsp;<h5><span>코딩</span>:85%</h5>&nbsp;&nbsp;&nbsp;&nbsp;<h5><span>도움</span>:15%</h5>                  	
                        </li>
                    </ul>
                </div><!--web_popup wp2-->
                 <div class="web_popup wp3">
                    <ul>
                        <li>
                        </li>
                        <li><h1><a href="http://user156.dothome.co.kr/"target="_blank">채식랜드</a></h1>
                        </li>
                        <li>
                            <h2>채식 Web<br>깔끔하고 신뢰있는 느낌을 주며 2번째 제작입니다.</h2>
                        </li>
                        <li>
                            <h2> ▶ 메인 페이지( <a href="http://user156.dothome.co.kr/html/"target="_blank">PC화면</a> )
                            </h2>
                            <h2> ▶ 서브 페이지( <a href="http://user156.dothome.co.kr/html/sub1.html"target="_blank">PC화면</a> )
                            </h2>
                        </li>
                        <li>
                        <h5><span>서브페이지</span>:O</h5>&nbsp;&nbsp;&nbsp;&nbsp;<h5><span>모바일</span>:X</h5><br>
                        <h5><span>디자인</span>:100%</h5>&nbsp;&nbsp;&nbsp;&nbsp;<h5><span>코딩</span>:80%</h5>&nbsp;&nbsp;&nbsp;&nbsp;<h5><span>도움</span>:20%</h5>                  	
                        </li>
                    </ul>   
                </div><!--web_popup wp3-->
                <div class="web_popup wp4">
                    <ul>
                        <li>
                        </li>
                        <li>
                            <h1><a href="http://seongs70.dothome.co.kr/"target="_blank">삼겹한잔</a></h1>
                        </li>
                        <li>
                            <h2>삼겹살 Web<br>편안한 느낌을 주며 3번째 제작입니다.</h2>
                        </li>
                        <li>
                            <h2> ▶ 메인 페이지( <a href="http://seongs70.dothome.co.kr/"target="_blank">PC화면</a>&nbsp;&nbsp;
                                <a href="#" onclick="window.open('http://seongs70.dothome.co.kr','삼겹한잔','width=411, height=731, scrollbars=yes'); return false">Mobile화면</a>
                            )</h2>
                        </li>
                        <li>
                        <h5><span>서브페이지</span>:X&nbsp;&nbsp;&nbsp;</h5><h5><span>모바일</span>:O</h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h5><span>부트스트랩</span>:O</h5><br>
                        <h5><span>디자인</span>:100%</h5>&nbsp;&nbsp;&nbsp;&nbsp;<h5><span>코딩</span>:85%</h5>&nbsp;&nbsp;&nbsp;&nbsp;<h5><span>도움</span>:15%</h5>                  	
                        </li>
                    </ul>
                </div><!--web_popup wp4-->
                <div class="web_popup wp5">
                    <ul>
                        <li>
                        </li>
                        <li><h1><a href="http://user5613.dothome.co.kr/sc"target="_blank"  onClick="window.open(this.href, '', 'width=414, height=736')">세이브 더 칠드런</a></h1>
                        </li>
                        <li>
                        <h2>NGO Web<br>사랑과 나눔을 느끼게 하며 4번째 제작입니다.</h2>
                        </li>
                        <li>
                            <h2> ▶ 메인 페이지(
                                <a href="#" onclick="window.open('http://user5613.dothome.co.kr/sc','SC','width=411, height=731, scrollbars=yes'); return false">Mobile화면</a>
                            )</h2>
                            <h2> ▶ 서브 페이지( 
                                <a href="#" onclick="window.open('http://user5613.dothome.co.kr/sc/sub.html','SC','width=411, height=731, scrollbars=yes'); return false">Mobile화면</a>
                            )</h2>
                        </li>
                        <li>
                        <h5>모바일전용<span></span></h5>&nbsp;&nbsp;&nbsp;&nbsp;<h5><span>서브페이지</span>:O</h5><br>
                        <h5><span>디자인</span>:100%</h5>&nbsp;&nbsp;&nbsp;&nbsp;<h5><span>코딩</span>:95%</h5>&nbsp;&nbsp;&nbsp;&nbsp;<h5><span>도움</span>:5%</h5>                  	
                        </li>
                    </ul>
                </div><!--web_popup wp5-->
                <div class="web_popup wp6">
                    <ul>
                        <li>
                        </li>
                        <li><h1><a href="http://seongs70.dothome.co.kr/sdk"target="_blank">SDK</a></h1>
                        </li>
                        <li>
                        <h2>도서 Web<br>행복한 느낌을 주며 첫번째 제작입니다.</h2>
                        </li>
                        <li>
                            <h2> ▶ 메인 페이지( <a href="http://seongs70.dothome.co.kr/sdk"target="_blank">PC화면</a> )
                            </h2>
                            <h2> ▶ 서브 페이지( <a href="http://seongs70.dothome.co.kr/sdk/product.html"target="_blank">PC화면</a> )
                            </h2>
                        </li>
                        <li>
                        <h5><span>서브페이지</span>:O</h5>&nbsp;&nbsp;&nbsp;&nbsp;<h5><span>모바일</span>:X</h5><br>
                        <h5><span>디자인</span>:100%</h5>&nbsp;&nbsp;&nbsp;&nbsp;<h5><span>코딩</span>:75%</h5>&nbsp;&nbsp;&nbsp;&nbsp;<h5><span>도움</span>:25%</h5>                  	
                        </li>
                    </ul>
                </div><!--web_popup wp6-->
                <div class="left_btn"><img src="/images/arrow-left.png"></div>
                <div class="right_btn"><img src="/images/arrow-right.png"></div>
                <div class="close_btn"><img src="/images/slide_close.png"></div>
            </div><!--web_popup_one-->                                                                                                                                                                                                                                               
        </div>                                                                                                      
    </div><!--web_popup_wrap-->
</article><!--a3-->
</section>
<script>
    	/*popup*/
	var imgNum=0;
	var popup=$('.popup');
	var imgLen=$('.web_gallery ul li').length;
	$('.web_popup_wrap > .web_popup_one > .web_popup').hide();
	
	//var Pnum=1;
	$('.right_btn').click(function(e) {
        imgNum++;
		if(imgNum>=7){
		imgNum=1;
		}
		//popupImg.empty();
		popup.fadeIn(300);
		popupImg.append($('.web_popup_wrap'));
		imgslide(imgNum);
    });
	$('.left_btn').click(function(e) {
        imgNum--;
		if(imgNum<1){
		imgNum=6;	
		}
		//popupImg.empty();
		popup.fadeIn(300);
		popupImg.append($('.web_popup_wrap'));
		imgslide(imgNum);
    });
	$('.web_popup_one .close_btn').click(function(){
		$('.web_popup_wrap').stop().hide();
		$('.web_gallery').stop().show();
	});
	var popupImg=popup.find('.popupImage');
	$('.popup').find('a').click(function(e){
		e.preventDefault();
	});
    $('.web_gallery ul li').click(function(){
		imgNum=$(this).index()+1;

		//popupImg.empty();
		popup.fadeIn(300);
		popupImg.append($('.web_popup_wrap'));
		imgslide(imgNum);
		
	});
	$('.popup a.close').click(function(){
		popup.fadeOut(100);
	});
	function imgslide(imgNum){
	$('.web_popup_wrap > .web_popup_one > .web_popup').each(function() {
        var P2num=$(this).index()+1;
		if(imgNum==P2num){
			$('.web_popup_wrap > .web_popup_one > .web_popup').hide();
			$(this).stop().fadeIn();
			//console.log(Pnum);
			}
    });
	}
</script>
@endsection
