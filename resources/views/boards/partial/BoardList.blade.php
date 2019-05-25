<script type="text/javascript" src="{!! asset('js/boardList.js') !!}"></script>
<div class="wrap">
    <header>
    {{-- PC버전 --}}
    <div class="PC_loginWrap">
        <div class="login loginOff">
          <a href="/auth/naver"><div class="naver_login" ></div></a>
            <a href="/auth/delete">회원탈퇴</a>
            <a href="/auth/passwordFind">비밀번호 찾기</a>
            <a href="/auth/register">회원가입</a>
            <a href="/auth/login">로그인</a>
            <h5> rkdtkdcj5071 // soon1223<span>네이버 계정</span></h5>
        </div>
        <!--유저가 로그인 했을시-->
        <a id="boardSetting" class="btn btn-default" href="/boards/">게시판 만들기</a>
        @if(Auth::user())
        <div class="login loginOn">
            <a href="/auth/logout" >로그아웃</a>
            <span>{{ Auth::user()->provider }}에서 로그인&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ Auth::user()->nickName }}</span>
        </div>
        <script>
            //로그인 여부로 보여주는 화면처리
            $('.login').css('display', 'none');
            $('.loginOn').css('display', 'block');
            $('.loginOn').css('margin-top', '-22px');
        </script>
        @endif
    </div>
    <div class="mainLogo_wrap">
        <div class="mainLogo"><a href="/"><img src="/images/logo.png"></a></div>
    </div>
    <div class="menu_btn btn1">
        <img src="/images/m_menu.png" alt="menu button"><a href="http://115.68.220.209:8000/">라라벨 포트폴리오</a>
    </div>
    <div class="boardList_wrap">
        <div class="boardList">
            <div class="m_login_icon">
                <a href="/auth/login"><img src="/images/m_login.png" />
                    <span class="loginOff">로그인</span>
                    @if(Auth::user())
                        <script>
                            //로그인 여부로 보여주는 화면처리
                            $('.loginOff').css('display', 'none');
                            $('.loginOn').css('display', 'block');
                        </script>
                    <a href="/auth/logout" ><span class="loginOff">로그아웃</span></a>
                    @endif
                </a>
                <img class="m_close_btn" src="/images/m_x_button.png" />
            </div>
            <div class="m_board">
                <a href="/boards/">게시판 관리</a>
            </div>
            <div class="boardNameBtn_wrap">
                <!--게시판 생성 반복문-->
               <div style="display:none;">{{$boards=0}}</div>
                    @forelse($boards = \App\Board::get() as $board)
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
                            </a>
                            <span>/</span>
                        </div>
                    @empty
                    @endforelse
                <div class="boardNameBtn ksh">
                    <a href="/api/products"><button type="button" style="color:chartreuse;">RESTful API</button></a><span>/</span>
                </div>
                <div class="boardNameBtn ksh">
                    <a href="/board/profile"><button type="button">프로필</button></a><span>/</span>
                </div>
                <div class="boardNameBtn ksh">
                    <a href="/board/publish"><button type="button">퍼블리싱</button></a><span>/</span>
                </div>
                <div class="boardNameBtn ksh">
                    <a href="/board/design"><button type="button">편집디자인</button></a><span>/</span>
                </div>
            </div>
        </div>
    </div>
    </header>
</div>
