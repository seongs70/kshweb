$(document).ready(function(e) {
// boardPublish.blade.php
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


// boardProfile.blade.php
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

    var winWidth=$(window).width();
	if(winWidth>960){
        $('#a3').css({'display':'block'});
        $('.gallery_frame').css({'display':'block'});
        $('.gallery_tap_title_wrap ul').css({'width':'481px'});
        $('section #a4 .gallery_frame').css({'margin-top':'70px'});
		$('#m_gallery_tap').css({'display':'none'});
		$('.m_design').css({'display':'none'});
    }


// boardDesign.blade.php
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





        $('#m_gallery_tap').find('a').click(function(e){
        		e.preventDefault();
        	$('.m_design ul').hide();
        	$('.m_design ul:first-child').show();
        	//ul li에 클릭 이벤트 설정
        	$('#m_gallery_tap ul li').click(function(){
            	//클릭한 li의 인덱스 번호를 num변수에 저장
            	//this : 클릭된 객체 li 가리킴
            	var num=$(this).index();

        	//.content안의 div객체의 개수만큼 반복
        	$('.m_design > ul').each(function(){
        		//.content안의 div 객체의 인덱스 번호를 bunho변수에 저장
        		var bunho=$(this).index();
        		//만약 bunho와 num값이 같다면
        		if(bunho==num){
        			//모든 div 숨김
        				$('.m_design > ul').hide();
        			//bunho에 해당하는 div 나타남
        				$(this).show();
        			}
        		});
        	});
        });












});
