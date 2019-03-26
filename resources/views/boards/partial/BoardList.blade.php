<div class="wrap">
    <div class="loginWrap">
        <div class="login" id="loginOff">
            <a href="/auth/delete">회원탈퇴</a>
            <a href="/auth/passwordFind">비밀번호 찾기</a>
            <a href="/auth/register">회원가입</a>
            <a href="/auth/login">로그인</a>
        </div>
        <!--유저가 로그인 했을시-->
        @if(Auth::user())
        <div class="login" id="loginOn">
            @if(Auth::user()->userType == '5')
            <a class="btn btn-default" href="/boards/" style="margin-top: -7px;">게시판 관리</a>
            @endif
            <a href="/auth/logout" >로그아웃</a>
            <span>{{ Auth::user()->provider }}에서 로그인&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ Auth::user()->nickName }}</span>
        </div>
        <script>
            //로그인 여부로 보여주는 화면처리
            $('#loginOff').css('display', 'none');
            $('#loginOn').css('display', 'block');
        </script>
        @endif
    </div>
    <div class="mainLogo_wrap">
        <div class="mainLogo"><a href="/"><img src="/images/logo.png"></a></div>
    </div>
    <div class="boardList">
        <div class="boardNameBtn_wrap">
            <div class="boardNameBtn ksh">
                <a href="/board/profile"><button type="submit">프로필</button></a><span>/</span>
            </div>
            <div class="boardNameBtn ksh">
                <a href="/board/publish"><button type="submit">퍼블리싱</button></a><span>/</span>
            </div>
            <div class="boardNameBtn ksh">
                <a href="/board/design"><button type="submit">편집디자인</button></a><span>/</span>
            </div>
            <!--게시판 생성 반복문-->
            @forelse($boards = \App\board::get() as $board)
            <div class="none">{{ $boardNumber = $board->boardNumber }}</div>
            <div class="none">{{ $boardName = $board->boardName }}</div>
            <div class="boardNameBtn">
                <a href="boards/{{ $board->boardNumber }}/posts">
                    <form method="get" action="{{ route('posts.index', ['boardNumber' => $board->boardNumber]) }}">
                    <input type="hidden" id="boardTypeCode" name="boardTypeCode" value="{{ $board -> boardTypeCode }}">   
                    <input type="hidden" id="boardName" name="boardName" value="{{$boardName}}">   
                    <input type="hidden" id="boardNumber" name="boardNumber" value="<?php echo $boardNumber; ?>">
                    <button type="submit">{{ $board->boardName }}</button>
                    </form>
                </a><span>/</span>
            </div>
            @empty
            <p class="text-center text-danger">게시판이 없습니다</p>
            @endforelse
        </div>
    </div>
</div>
<script>
    // 가운데 정렬하기 위한 게시판의 길이 구하기
    var sum = 0;  
    $('.boardNameBtn_wrap > .boardNameBtn').each(function(){
        var boardNameBtnLength = $(".boardNameBtn").length;
		var bunho=$(this).index();
        var aa = $(this).width();
        sum += aa;
    });
    var sum1 = sum+2;
    var boardNameBtnWidth = $('.boardNameBtn_wrap').width(sum1);
</script>

