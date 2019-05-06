@extends('layouts.master')

<!DOCTYPE html>
@section('stylesheet')

@section('script')
<script type="text/javascript" src="{!! asset('js/publish.js') !!}"></script>
<link href="{{ asset('/css/publish.css') }}" rel="stylesheet" type="text/css" >
<style>
html{    overflow-y: hidden;}
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
<div class="m_publish">
	<div class="m_notice">
		<span>퍼블리싱</span>
	</div>
	<ul>
		<a href="http://dynamite156.dothome.co.kr" target="_blank">
			<li><img src="/images/Tuna.png"><span>참치집</span></li>
		</a>
		<a href="http://user3763.dothome.co.kr"target="_blank">
			<li><img src="/images/statue.png"><span>피규어</span></li>
		</a>
		<a href="http://user5613.dothome.co.kr/sc"target="_blank">
			<li><img src="/images/m_sc.png"><span>세이브더칠드런</span></li>
		</a>
		<a href="http://seongs70.dothome.co.kr/"target="_blank">
			<li><img src="/images/sam.png"><span>삼겹살</span></li>
		</a>
	</ul>
</div>
</section>

@endsection
