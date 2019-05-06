$(document).ready(function(e) {
    // 가운데 정렬하기 위한 게시판의 길이 구하기
    var winWidth=$(window).width();
	if(winWidth>960){
        var sum = 0;
        $('.boardNameBtn_wrap > .boardNameBtn').each(function(){
            var boardNameBtnLength = $(".boardNameBtn").length;
    		var bunho=$(this).index();
            var aa = $(this).width();
            sum += aa;
        });
        var sum1 = sum+2;
        var boardNameBtnWidth = $('.boardNameBtn_wrap').width(sum1);
    }

    /*모바일 네비게이션*/
    $('.menu_btn img').click(function(e){
        e.preventDefault();
        $('.boardList').stop().css({'display':'block'});
        $('.boardList_wrap').css('background-color', 'rgba(0,0,0,.8)');
        $('.boardList_wrap').css({'height':'100%'});
    });
    $('.m_close_btn').click(function(e){
        e.preventDefault();
        $('.boardList').stop().css({'display':'none'});
        $('.boardList_wrap').css('background-color', 'inherit');
        $('.boardList_wrap').css({'height':'0%'});

    });
    $('.boardNameBtn button').click(function(e){
        $('.boardList').stop().css({'display':'none'});
        $('.boardList_wrap').css('background-color', 'inherit');
    });

    $('.mobile_nav nav >ul>li>a').click(function(){
        //만약 주메뉴(a)에 active클래스가 설정되어 있지 않으면
        //attr() : 객체의 속성을 검색하는 메서드
        //!= : '같지않다'라는 비교연산자
        if($(this).attr('class') != 'active'){
            //주메뉴의 다음 형제(sub)들어감
            //next : 다음형제객체
            //prev : 이전형제객체
            //siblings('li') : 형제객체찾기
            $('.mobile_nav nav>ul>li>a').next().stop().slideUp();
            //주메뉴의 active클래스 모두 제거
            $('.mobile_nav >ul>li>a').removeClass('active');
            //클릭한 메뉴에만 active클래스 추가
            $(this).addClass('active');
            //클릭한 메뉴의 다음 형제(sub) 나타남
            $(this).next().stop().slideDown();
            //만약 주메뉴(a)에 active클래스가 설정되어 있으면
        }else{
            //클릭한 메뉴의 active클래스 제거
            $(this).removeClass('active');
            //클릭한 메뉴의 다음 형제(sub)
            $(this).next().stop().slideUp();
        }
    });
});
