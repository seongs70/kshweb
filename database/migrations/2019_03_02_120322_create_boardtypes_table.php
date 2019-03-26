<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoardtypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boardtypes', function (Blueprint $table) {
            //게시판 타입, 1번:일반형 2번:갤러리형 3번:Q&A형
            //데이터값 직접 1,2,3 넣어주어야함
            $table->char('boardTypeCode', '2')->primary();
            $table->string('boardTypeCodeName', '30');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boardtypes');
    }
}
