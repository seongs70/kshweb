<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            //게시글 일련번호
            $table->increments('postNumber');
            //게시판 일련번호
            $table->unsignedinteger('boardNumber');
            //회원 일련번호
            $table->unsignedinteger('userNumber');
            //닉네임
            $table->string('nickName');
            //부모 게시글 일련번호
            $table->unsignedinteger('postparentNumber')->nullable();
            //게시글 명
            $table->string('postName');
            //내용
            $table->text('postContent');
            //상태 값
            $table->char('statusValue','1');
            //조회수
            $table->smallInteger('viewCount')->nullable();
            //썸네일
            $table->string('thumbnail')->nullable();
            //등급별 상태값
            $table->char('announcementFunctionStatus','1');
            //블라인드 상태값
            $table->char('secretPostStatus','1');
            $table->timestamps();
            //외래키 관계
            $table->foreign('boardNumber')->references('boardNumber')->on('boards')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
