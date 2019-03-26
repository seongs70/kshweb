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

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    //댓글 생성 처리
    public function store(\App\Http\Requests\CommentsRequest $request, \App\Post $post)
    {   
        

        $boardNumber = $request->boardNumber;
        //댓글 생성처리, 입력받은 데이터 생성
        $comment = $post->comments()->create($request->all());
        return redirect(route('posts.show', ['boardNumber' => $request->boardNumber, 'postNumber' => $request->postNumber]));
    }
    
    //댓글 수정 처리
    public function update(\App\Http\Requests\CommentsRequest $request, \App\Post $post)
    {
        \DB::table('comments')->where('commentNumber', $request->commentNumber)->update(['commentContent' => $request->commentContent,]);
        return redirect(route('posts.show', ['boardNumber' => $request->boardNumber, 'postNumber' => $request->postNumber]));
    }
    
    //댓글 삭제
    public function destroy(\App\Http\Requests\CommentsRequest $request, \App\Post $post)
    {
        \DB::table('comments')->where('commentNumber', $request->commentNumber)->delete();
        return redirect(route('posts.show', ['boardNumber' => $request->boardNumber, 'postNumber' => $request->postNumber]));
    }
    
}
