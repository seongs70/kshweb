
$(document).ready(function(e) {


var imgNum=0;
	$('.slideshow ul li').hide();
	$('.slideshow ul li:first-child').show();
	//var Pnum=1;
	$('.slidenav__item--next').click(function(e) {
        imgNum++;
		if(imgNum>=3){
		imgNum=0;
		}
		//popupImg.empty();
		imgslide();
    });
	$('.slidenav__item--prev').click(function(e) {
        imgNum--;
		if(imgNum<0){
		imgNum=2;
		}
		imgslide();
    });

	function imgslide(){
	$('.slideshow ul li').each(function() {
        var P2num=$(this).index()
		if(imgNum==P2num){
			$('.slideshow ul li').hide();
			$(this).stop().fadeIn(800);
			//console.log(Pnum);
			}
    });
	}
	var winWidth=$(window).width();
	if(winWidth>1280){


	     //자동으로 슬라이드됨
		var auto=setInterval(autofn,3000);

		//slide영역에 마우스 올리면 자동 슬라이드 안됨
		$('.slideshow').hover(function(){
			clearInterval(auto);
		});
		//slide영역에 마우스 치우면 다시 자동 슬라이드됨
		$('.slideshow').mouseleave(function(){
			auto=setInterval(autofn,3000);
		});
		$( '.bg3 ul' ).css("display","none" );
		var boardheight = $( '.bg3_1' ).offset().top;
		var M1 = $('.main1').offset().top;
		// $( '.bg3_1 ul').hide();
			  $(window).scroll(function () {
			    var height = $(document).scrollTop();
			    var bottom = height + screen.availHeight;
			    if(bottom > boardheight){
			      $( '.bg3_1 ul:first-child').css("display","block" ).animate({left:"3%"},1300);
			      $( '.bg3_1 ul:last-child').css("display","block" ).animate({right:"10%"},1300);
			    }

			});
	}
	//자동으로 오른쪽 버튼 클릭하라는 함수 선언
	function autofn(){
		$('.slidenav__item--next').click();
	}
	var winWidth=$(window).width();
	if(winWidth>960){
     //flip

		$('.hover').hover(function(){
			$(this).addClass('flip');
		},
		function(){
			$(this).removeClass('flip');
		});
	}




});
