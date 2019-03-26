<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
class UsersController extends Controller
{
    //비회원 유저 처리
    public function __construct()
    {   
        //비회원은 삭제하는것 막기
        $this->middleware('guest', ['except' => 'destroy']);
    }
    
    //index 페이지
    public function index()
    {
        flash('환영합니다');
        return view('/');
    }
    
    //회원가입 페이지
    public function registerCreate()
    {   
        //회원가입 페이지로
        return view('users.create');
    }

    //users.create에서 전송받은 데이터 처리
    public function reisterStore(\App\Http\Requests\UsersRequest $request)
    {      
        //DB에 넣기
        $user = \App\User::create([
            'userId' => $request->input('userId'),
            'name' => $request->input('name'),
            'nickName' => $request->input('nickName'),
            'userType' => '2',
            'provider' => 'web',
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);
        //로그인 하기
        auth()->login($user);
        //뒤로 가기
        return back();
    }
    
    
    //로그인 페이지로
    public function loginCreate()
    {
        return view('users.login');
    }
    
    //로그인에서 받은 데이터 처리
    public function loginStore(Request $request)
    {   

        //ID 또는 비밀번호가 일치하지 않을시
        if(! auth()->attempt($request->only('userId', 'password'), $request->has('remember'))){
            return back()->with('alert', '아이디 또는 비밀번호가 맞지 않습니다.');
        }
        //유저 아이디 비밀번호 입력 값
        $credentials = $request->only('userId', 'password');
        
        //로그인시 Type이 2이면 일반회원이고 접속 성공
        if (Auth::attempt($credentials) && Auth::user()->userType == '2') {
            return redirect()->intended('/');
        }
        
        //Type이 5이면 관리자
        else if (Auth::attempt($credentials) && Auth::user()->userType == '5') {
            return redirect()->intended('/');
        }
        
        //Type이 3이면 회원탈퇴한 사람으로 처리 로그아웃 시켜 버린다.
        else if(Auth::attempt($credentials) && Auth::user()->userType == '3') {
            auth()->logout();
            return back()->with('alert', '탈퇴한 회원입니다.');
        }
        
        //로그인 기억하기 위해 사용 
        $remember = Auth::user()->remember_token;
        if (Auth::attempt(['userId' => $request->userid, 'password' => $request->password,], $remember)) {
            return redirect()->intended('/');
        }
    }
    
        //회원탈퇴 페이지로
    public function userDestroyCreate()
    {
        return view('users.delete');
    }
    
    //회원탈퇴 페이지에서 받은 데이터 처리
    public function userDestroyStore(\App\Http\Requests\PasswordRequest $request)
    {   
        //입력받은 값
        $credentials = $request->all('userId', 'password', 'name');
        
        if(Auth::attempt($credentials))
        {
            //유저Type을 3으로 바꿔버리고 로그아웃 시킨다.
            \DB::table('users')->where('userId', $request-> userId)->update(['userType' => '3']);
            auth()->logout();
            return redirect('/')->with('alert', '탈퇴가 완료되었습니다.');
        }
        else
        {   
            //DB에 아이디 비밀번호 이름이 모두 일치 하지 않을
            return redirect()->intended('/auth/delete')->with('alert', '정보가 일치하지 않습니다.');
        }
    }
        
    //비밀번호 찾기
    public function passwordFindCreate()
    {
        return view('users.passwordFind');
    }
    
    //비밀번호 찾기에서 입력받은 데이터 처리
    public function passwordFindStore(\App\Http\Requests\PasswordFindRequest $request)
    {       
        //아이디 이름 이메일 입력 값
        $passwordFinda = $request->all('userId', 'name', 'email');
        
        //DB에 아이디에 맞는 아이디,이름,타입 이메일 열 셀렉
        $users = \DB::select("select userId, name, userType, email from users where userId='$request->userId'");
        
        
        foreach ($users as $user) {
            //입력받은 값이 $users의 데이터값과 일치하면 패스워드 수정하는 뷰로 이동
            if($user->userId == $request->userId && $user->userType == '2' && $user->name == $request->name && $user->email == $request->email){
                return view('users.passwordReset')->with('user', $request->userId);
            
            }
            //일치하는데 유저타입이 3번이면 탈퇴회원이라고 보여줌
            else if($user->userId == $request->userId && $user->userType == '3' && $user->name == $request->name && $user->email == $request->email){
                return redirect()->intended('/auth/passwordFind/')->with('alert', '탈퇴한 회원입니다.');
            
            }
            //정보가 일치하지 않을시
            else {
                return redirect()->intended('/auth/passwordFind/')->with('alert', '정보가 일치하지 않습니다.');
            }
        }
    }
    
    //비밀번호 변경 처리
    public function passwordFindUpdate(Request $request)
    {   
        //비밀번호 유효성 검사
        $validater = $request->validate([
        'password' => 'required|min:5|max:255',
        ]);
        //입력받은 비밀번호로 수정
        \DB::table('users')->where('userId', $request->userId)->update(['password' => bcrypt($request->password)]);
        auth()->logout();
        return redirect()->intended('/')->with('alert', '비밀번호가 변경되었습니다.');
    }
    
    //비회원시
    public function guest(Request $request)
    {   
        flash('로그인이 필요합니다.');
        return back();
    }
    
}
