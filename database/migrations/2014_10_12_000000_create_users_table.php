<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            //회원 일련번호
            $table->increments('userNumber');
            //아이디
            $table->string('userId')->nullable();
            //이름
            $table->string('name', '30');
            //닉네임
            $table->string('nickName', '200')->unique();
            //회원 타입
            $table->string('userType', '2');
            //생성 유형
            $table->string('provider', '30')->nullable();
            //이메일
            $table->string('email', '200')->nullable();
            //소셜 아이디
            $table->string('socialId', '100')->nullable();
            //패스워드
            $table->string('password')->nullable();
            //소셜로 로그인했을때 필요
            $table->text('token')->nullable();
            //회원을 기억하기 위해 필요
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
