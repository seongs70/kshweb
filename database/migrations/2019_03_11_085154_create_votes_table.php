<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->increments('voteNumber');
            $table->unsignedinteger('userNumber');
            $table->unsignedinteger('postNumber');
            $table->tinyInteger('up')->nullable();
            $table->tinyInteger('down')->nullable();
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
        Schema::table('votes', function (Blueprint $table){
            $table->dropForeign('votes_comment_commentNumber_foreign');
            $table->dropForeign('votes_user_userNumber_foreign');
    });
        
    Schema::dropIfExists('votes');
    }
}
