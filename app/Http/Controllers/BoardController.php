<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Board;

class BoardController extends Controller
{
    //게시판 목록 데이터
     public function index()
    {
        //게시판 데이터 가져오기
        $boards = \App\Board::get();
        // user() 관계가 필요 없는 다른 로직 수행
        $boards->load('user');
        //게시판 페이지 네이트
        //$boards = \App\Boards::paginate(5);
        return view('boards.boardIndex', compact('boards'));
    }

    //게시글 생성
    public function create()
    {
        //게시판 객체 생성
        $board = new \App\Board;
        return view('boards.boardCreate', compact('board'));
    }

        //게시글 생성에서 입력받은 데이터 처리
        public function store(Request $request)
    {
        //게시글 저장 안됬을시 뒤로 가기
        if(!$request){
            return back()->with('flash_,essage', '게시판이 저장되지 않았습니다.')->withInput();
        }
        //현재 유저 아이디
        //$currentUserId = Auth::user()->userId;
        //게시판 생
        $board = \App\Board::create([
            'boardName' => $request->input('boardName'),
            'boardTypeCode' => $request->input('boardTypeCode'),
            'statusValue' => '1',
            'registUser' => '',
        ]);
        return redirect(route('boards.index'))->with('flash_message', '게시판이 저장되었습니다.');
    }

    //게시판 상세보기
    public function show(Request $request){

        $boardNumber = $request->boardNumber;
        $boardName = $request->boardName;
        $boardTypeCode = $request->boardTypeCode;

        //게시글은: 게시판 일련번호/게시글 일련번호/식으로 라우트에 파라미터가 변하여서 여기처럼 깔끔하게 get을 안쓰고 $board처럼 깔끔한 변수 데이터 처리가 안된다
        //그래서 일일이 get()으로 DB에 계속접속해 데이터를 가져와야 했다 수정해야할 부
        return view('boards.boardShow', compact('boardNumber','boardName','boardTypeCode'));
    }

    //게시판 수정
    public function edit(Request $request)
    {

        //게시판 수정에 데이터 처리
        //$this->authorize('update', $board);
        $boardNumber = $request->boardNumber;
        $boardName = $request->boardName;
        return view('boards.boardEdit', compact('boardNumber','boardName'));
    }

    //게시 수정view에서 입력받은 데이터 처리
    public function update(Request $request)
    {

        //flash()->success('수정하신 내용을 저장했습니다.');
        \DB::table('boards')->where('boardNumber', $request->boardNumber)->update(['boardName' => $request->boardName]);
        return redirect(route('boards.show', ['boardNumber' => $request->boardNumber, 'boardName' => $request->boardName ]));
    }

    //게시판 삭제
    public function destroy(Request $request)
    {
        // $boardNumber = $request->boardNumber;
        // \DB::table('boards')->where('boardNumber', $boardNumber)->delete();
        return redirect('/boards');
    }

}
