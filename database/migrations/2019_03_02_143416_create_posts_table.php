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
            $table->increments('postNumber');
            $table->unsignedinteger('boardNumber');
            $table->unsignedinteger('userNumber');
            $table->string('nickName');
            $table->unsignedinteger('postparentNumber')->nullable();
            $table->string('postName');
            $table->text('postContent');
            $table->char('statusValue','1');
            $table->smallInteger('viewCount')->nullable();
            $table->string('thumbnail')->nullable();
            $table->char('announcementFunctionStatus','1');
            $table->char('secretPostStatus','1');
            $table->timestamps();
            
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
