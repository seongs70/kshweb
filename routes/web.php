<?php

Route::get('/', function () {
    return view('home');
});
Route::get('home', function () {
    return view('home');
});


//프로필 게시판
Route::get('/board/profile', function () {
    return view('boards.boardProfile');
});
//퍼블리싱 게시판
Route::get('/board/publish', function () {
    return view('boards.boardPublish');
});
//편집디자인 게시판
Route::get('/board/design', function () {
    return view('boards.boardDesign');
});




/*네이버 로그인*/
Route::get('/auth/logout', 'NaverAuthController@destroy');
Route::get('/auth/naver', 'NaverAuthController@redirectToProvider');
Route::get('/auth/naver/callback', 'NaverAuthController@handleProviderCallback');


/* 사용자 가입 */

Route::get('auth/register', [
    'as' => 'users.create',
    'uses' => 'UsersController@registerCreate'
]);
Route::post('auth/register',[
    'as' => 'users.reisterStore',
    'uses' => 'UsersController@reisterStore'
]);


/* 로그인 */
Route::get('auth/login', [
    'as' => 'users.login',
    'uses' => 'UsersController@loginCreate'    
]);
Route::post('auth/login', [
    'as' => 'users.loginStore',
    'uses' => 'UsersController@loginStore'    
]);

/* 회원탈퇴 */
Route::get('auth/delete',[
    'as' => 'users.delete',
    'uses' => 'UsersController@userDestroyCreate'
]);

Route::post('auth/delete',[
    'as' => 'users.userDestroyStore',
    'uses' => 'UsersController@userDestroyStore'
]);

/* 비밀번호 찾기  */
Route::get('auth/passwordFind',[
    'as' => 'users.passwordFind',
    'uses' => 'UsersController@passwordFindCreate'
]);

Route::post('auth/passwordFind',[
    'as' => 'users.passwordFindStore',
    'uses' => 'UsersController@passwordFindStore'
]);

/*비밀번호 재설정*/
Route::post('auth/passwordReset',[
    'as' => 'users.passwordFindUpdate',
    'uses' => 'UsersController@passwordFindUpdate'
]);


//게시판
Route::resource('boards', 'BoardController');


Route::get('board/{boardNumber}/', [
    'as' => 'boards.show',
    'uses' => 'BoardController@show'
]);

Route::get('board/{boardNumber}/delete', [
    'as' => 'board.delete',
    'uses' => 'BoardController@destroy'
]);

Route::get('board/{boardNumber}/edit', [
    'as' => 'board.edit',
    'uses' => 'BoardController@edit'
]);

Route::post('board/{boardNumber}/update', [
    'as' => 'board.update',
    'uses' => 'BoardController@update'
]);








///////////게시글///////////
//게시글
Route::get('/boards/{boardNumber}/posts', [
    'as' => 'posts.index',
    'uses' => 'PostController@index'
]);
//게시글 등록
Route::get('/boards/{boardNumber}/posts/create', [
    'as' => 'posts.create',
    'uses' => 'PostController@create'
]);
//게시글 등록
Route::post('/boards/{boardNumber}/posts/create', [
    'as' => 'posts.store',
    'uses' => 'PostController@store'
]);
//게시글 등록처리
Route::get('boards/{boardNumber}/posts/{postNumber}', [
    'as' => 'posts.show',
    'uses' => 'PostController@show'
]);
//게시글 수정
Route::get('boards/{boardNumber}/posts/{postNumber}/edit', [
    'as' => 'posts.edit',
    'uses' => 'PostController@edit'
]);
//게시글 수정 처리
Route::post('boards/{boardNumber}/posts/{postNumber}/update', [
    'as' => 'posts.update',
    'uses' => 'PostController@update'
]);
//게시글 삭제
Route::get('boards/{boardNumber}/posts/{postNumber}/delete', [
    'as' => 'posts.delete',
    'uses' => 'PostController@destroy'
]);
//게시글 파일 다운로드
Route::get('boards/{boardNumber}/posts/{postNumber}/fileDownload', [
    'as' => 'posts.filedownload',
    'uses' => 'PostController@fileDownload'
]);
//게시글 좋아요,싫어요
Route::get('boards/{boardNumber}/posts/{postNumber}/vote', [
    'as' => 'posts.vote',
    'uses' => 'PostController@vote'
]);







///////////댓글///////////
//댓글
Route::post('boards/{boardNumber}/posts/{postNumber}/comments', [
    'as' => 'posts.comment',
    'uses' => 'CommentsController@store'
]);
//댓글 업데이트
Route::post('boards/{boardNumber}/posts/{postNumber}/comments/{commentNumber}/update', [
    'as' => 'posts.commentUpdate',
    'uses' => 'CommentsController@update'
]);
//댓글 삭제
Route::post('boards/{boardNumber}/posts/{postNumber}/{commentNumber}/delete', [
    'as' => 'posts.commentDelete',
    'uses' => 'CommentsController@destroy'
]);




