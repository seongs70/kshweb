<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('commentNumber');
            $table->unsignedinteger('postNumber');
            $table->unsignedinteger('userNumber');
            //댓글의 댓글을 위한 재귀적 일대다 관계를 표현
            //이 열에 값이 없으면 최상위 댓글이란 뜻
            $table->unsignedinteger('parentCommentNumber')->nullable();
            $table->text('commentContent');
            //$table->text('postReportContent')->nullable();
            $table->char('statusValue','1');
            
            $table->timestamps();
            
            $table->foreign('userNumber')->references('userNumber')->on('users')->onDelete('cascade');
            $table->foreign('postNumber')->references('postNumber')->on('posts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
