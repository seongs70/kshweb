<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boards', function (Blueprint $table) {
            //게시판 일련번호
            $table->increments('boardNumber');
            //게시판 타입
            $table->char('boardTypeCode','2');
            //게시판명
            $table->string('boardName')->nullable();
            //상태값
            $table->char('StatusValue','1');
            //등록회원
            $table->string('registUser');
            $table->timestamps();
            $table->foreign('boardTypeCode')->references('boardTypeCode')->on('boardtypes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boards');
    }
}
