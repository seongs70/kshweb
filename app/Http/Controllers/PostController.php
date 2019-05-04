<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Quotation;
use App\Post;
use App\User;
use App\File;
use App\Comment;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\UploadedFile;
use Image;
use Validator;

class PostController extends Controller
{
    public function __construct()
    {
        //비회원 제외
        //$this->middleware('auth', ['except'=>['index','show']]);
    }

    //게시글 목록
    public function index(Request $request, $slug = null)
    {
        //게시판 코드, 일련번호, 명, 변수처리
        $boardTypeCode = $request -> boardTypeCode;
        $boardNumber = $request -> boardNumber;
        $boardName = $request -> boardName;
        //댓글 데이터 가져오기
        $comment = \App\Comment::get();
        // user() 관계가 필요 없는 다른 로직 수행
        //$posts->load('user');
        ///게시판 데이터 가져오기
        $posts = \App\Post::get();
        // latest : 정렬 역순으로 나오게 하기, paginate:페이지 개수 설정, get()저걸 해야 아래 where구문이 먹힌다
        $posts = \App\Post::where('boardNumber', '=', $boardNumber)->where('postparentNumber',null)->latest()->paginate(10);
        //form에서 select : 제목, 내용, 이름, 무엇인지의 대한 변수
        $find = $request -> find;
        //검색한 내용 변수저장
        $search  = $request -> search;

        //검색값이 있으면 검색값을 찾는것 검색값 앞뒤 아무거나 붙을 수 있다
        if($find || $search !== null){
        $searchs = \App\Post::where('boardNumber',$boardNumber)->where($find, 'like', '%' . $search . '%')->where('postparentNumber',null)->latest()->paginate(10);
        }
        //게시판 코드가 2면 섬네일 데이터를 보내준다, 게시판 코드가 2가아니면 썸네일 코드가 없다
        //get으로 가져오면 compact를 사용하면 get 정보를 view에 데이터를 뿌려줄 수 있다. compact가 적용되는 건 posts
        //나머지는 프론트단에서 submit으로 보낸값들을 변수로 지정해 리턴하는 view에 데이터를 넘겨준다
        if($boardTypeCode == 2 ){
            if(isset($searchs) && isset($thumbnail))
            {
                return view('posts.postIndex', compact('posts','boardNumber','boardName','comment','searchs','find','search','boardTypeCode','thumbnail'));
            }
            else if(isset($searchs) && empty($thumbnail))
            {
                return view('posts.postIndex', compact('posts','boardNumber','boardName','comment','searchs','find','search','boardTypeCode'));
            }
            else if(empty($searchs) && isset($thumbnail))
            {
                return view('posts.postIndex', compact('posts','boardNumber','boardName','comment','find','search','boardTypeCode','thumbnail'));
            }
            else if(empty($searchs) && empty($thumbnail))
            {
                return view('posts.postIndex', compact('posts','boardNumber','boardName','comment','find','search','boardTypeCode'));
            }
        }else{
            if(isset($searchs)){
                return view('posts.postIndex', compact('posts','boardNumber','boardName','comment','searchs','find','search','boardTypeCode'));
            }
            else
            {
                return view('posts.postIndex', compact('posts','boardNumber','boardName','comment','find','search','boardTypeCode'));
            }
        }
    }

    //게시글 생성 뷰 데이터
    public function create(Request $request)
    {
        $boardTypeCode = $request -> boardTypeCode;
        $boardNumber = $request -> boardNumber;
        $post = new \App\Post;
        return view('posts.postCreate', compact('post','boardNumber','boardTypeCode'));
    }

    //게시글 생성뷰에서 전송한 데이터 처리
    public function store(Request $request)
    {
        //form으로 받은 게시판 코드, 일련번호 변수처리
        $boardTypeCode = $request -> boardTypeCode;
        $boardNumber = $request->boardNumber;
        //게시글 내용 변수에 저장
        $detail=$request->input('postContent');

        //이지윅으로 사진 첨부시 base64인코딩 때문에 글자수가 너무 길게 DB에 저장된다.
        //그렇기 때문에 아래 문법으로 원래 파일명으로 저장시킨다.
        $dom = new \DomDocument();
        $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');

        foreach($images as $k => $img){
            $data = $img->getAttribute('src');
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $data = base64_decode($data);
            $image_name= "/upload/" . time().$k.'.png';
            $path = public_path() . $image_name;
            file_put_contents($path, $data);
            $img->removeAttribute('src');
            $img->setAttribute('src', $image_name);
        }
        $detail = utf8_decode($dom->saveHTML($dom->documentElement));

        //글이 저장되지 않았을시
        if(!$request){
            return back()->with('flash_message', '글이 저장되지 않았습니다.')->withInput();
        }

            //현재 접속중인 사용자 일련번호
            $currentUserNumber = Auth::user()->userNumber;
            //현재 접속중인 사용자 닉네임
            $currentUserNickName = Auth::user()->nickName;
            //게시글 생성
            $post = \App\Post::create([
            'boardNumber' => $request->input('boardNumber'),
            'nickName' => $currentUserNickName,
            'userNumber' => $currentUserNumber,
            'postparentNumber' => $request->input('postparentNumber'),
            'postName' => $request->input('postName'),
            'postContent' => $detail,//$request->input('postContent'),
            'statusValue' => '1',
            'announcementFunctionStatus' => '1',
            'secretPostStatus' => '1',
        ]);

        //파일첨부를 했을시

        if ($request->hasFile('files')){
            $files = $request->file('files');
            foreach($files as $file){
                //파일 이름 지정 : 중복된 파일이 있을 수 있어 생성하는 게시글의 일련번호_'파일명'으로 생성하도록 하였다
                $filename = $post -> postNumber.'_'.filter_var($file->getClientOriginalName(), FILTER_SANITIZE_URL);
                // 순서 중요 !!!
                // 파일이 PHP의 임시 저장소에 있을 때만 getSize, getClientMimeType등이 동작하므로,
                // 우리 프로젝트의 파일 저장소로 업로드를 옮기기 전에 필요한 값을 취해야 함.
                $post->files()->create([
                'filename'=>$filename,
                'bytes' => $file->getSize(),
                'mime' => $file->getClientMimeType()
                ]);
                $file->move(files_path(), $filename);
            }
        }
        //게시판 타입이 2번은 갤러리 게시판이다 갤러리 게시판은 첨부한 이미지 파일을 크기를 줄여 썸네일 파일을 새로 생성한다.
        if($boardTypeCode == 2){
            //썸네일 파일 생성
            //intervention/image:이미지 실시간 미리보기(썸네일) , base64 해결하기 위해, composer로 설치해야된다. app/config에 등록도 해야함
            $thumbnail = Image::make(public_path('/files/'.$filename))->resize(360, '')->save(public_path('/thumbnail/'.$filename));
            \DB::table('posts')->where('postNumber', $post->postNumber)->update(['thumbnail' => $filename]);
        }
        //라우터로 리다이렉트 어느 게시판의 생성하는지, 게시판의 코드는 뭔지 데이터가 필요해서 보내준다
        return redirect(route('posts.index', ['boardNumber' => $request->boardNumber, 'boardTypeCode'=>$boardTypeCode,]));
    }

    //게시글
    public function show(Request $request)
    {

        //게시판 일련번호, 코드 ,명      게시글 일련번호
        $boardName = $request->boardName;
        $boardNumber = $request->boardNumber;
        $postNumber = $request->postNumber;
        $boardTypeCode = $request->boardTypeCode;
        //$boardTypeCode = DB::table('boards')->where('boardNumber', '=' ,$boardNumber)->value('boardTypeCode');
        //where구문으로 게시글의 맞는 파일, 댓글, 투표, 게시글정보 , 조회수 데이터 처리
        $posts = \App\Post::get()->where('postNumber',$postNumber);
        $files = \App\File::get()->where('post_postNumber',$postNumber);
        $comments = \App\Comment::get()->where('postNumber',$postNumber);
        $vote = \App\Vote::get()->where('postNumber',$request->postNumber);
        $viewCount = DB::table('posts')->where('postNumber', $request->postNumber)->value('viewCount');

        //update랑 delete를 구문을 사용하려면 Providers에서 AuthServiceProvider에서 설정해줘야한다.
        \DB::table('posts')->where('postNumber', $request->postNumber)->update(['viewCount' => ++$viewCount]);

        //3:갤러리 게시판일시
        if($boardTypeCode == 3){
            //부모게시글이 어떤 일련번호인지 데이터 가져옴
            $parentPosts  = \App\post::get()->where('postparentNumber',$postNumber);
            return view('posts.postShowQ&A', compact('posts','boardName','postNumber','boardNumber','files','comments','vote','viewCount','parentPosts','boardTypeCode'));
        } else{
        return view('posts.postShow', compact('posts','boardName','postNumber','boardNumber','files','comments','vote','viewCount','boardTypeCode'));
        }
    }

    //파일다운로드
    public function fileDownload(Request $request){

        //파일 다운로드 클릭하면 파일경로에 있는 파일 다운로드 시킴
        return response()->download(files_path($request -> fileDownload));
    }

    //글 수정
    public function edit(Request $request)
    {
        //글 수정 뷰로 가기 위한 데이터처리
        //필요한 데이터 변수처리 해주고

        $boardNumber = $request-> boardNumber;
        $postNumber = $request->postNumber;
        $boardTypeCode = $request->boardTypeCode;
        $postContent = $request->postContent;
        $postName = $request->postName;
        $this->authorize('update', $request);
        return view('posts.postEdit', compact('boardNumber','postNumber','boardTypeCode','postContent','postName'));
    }

    //글 수정view에서 입력한 데이터 처리
    public function update(Request $request)
    {
        Validator::make($request->all(), [
            'postName' => 'required|min:2',
            'postContent' => 'required|min:8',
        ])->validate();
        $boardTypeCode = $request->boardTypeCode;
        $boardNumber = $request->boardNumber;
        //위즈윅으로 사진 올렸을 시 사진 이름이 base64라 너무길기에 파일명 이름으로 수정하는 변수처
        $detail=$request->input('postContent');
        $dom = new \DomDocument();
        $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');
        foreach($images as $k => $img){
            $data = $img->getAttribute('src');
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $data = base64_decode($data);
            $image_name= "/upload/" . time().$k.'.png';
            $path = public_path() . $image_name;
            file_put_contents($path, $data);
            $img->removeAttribute('src');
            $img->setAttribute('src', $image_name);
        }
        $detail = utf8_decode($dom->saveHTML($dom->documentElement));
        //DB에 업데이트
        \DB::table('posts')->where('postNumber', $request->postNumber)->update(['postName' => $request->postName, 'postContent' => $detail]);

        return redirect(route('posts.index', ['boardNumber' => $request->boardNumber, 'boardTypeCode' => $boardTypeCode]));
    }

    //글 삭제
    public function destroy(Request $request, \App\Post $post)
    {
        $boardTypeCode = $request->boardTypeCode;
        //게시글 삭제
        \DB::table('posts')->where('postNumber', $request->postNumber)->delete();
        //항상 posts.index에 게시글 코드랑 ,게시판 코드가있어야 view에서 알맞은 화면을 표시해준다 게시판 코드가 있어야 갤러리형으로 보여주는지
        //일반게시판으로 보여주는지를 보여준다
        return redirect(route('posts.index', ['boardNumber' => $request->boardNumber, 'boardTypeCode' => $request->boardTypeCode]));
    }

    //투표기능, 좋아요, 싫어요
    public function vote(Request $request, \App\Post $post)
    {
        //모델$post인 모델 게시글과 연결해서 투표기능
        $post->vote()->create([
            'userNumber' => $request->userNumber,
            'postNumber' => $request->postNumber,
            'up' => $request->up,
            'down' => $request->down,
            ]);
        return redirect(route('posts.show', ['boardNumber' => $request->boardNumber, 'postNumber' => $request->postNumber]));
    }

}
