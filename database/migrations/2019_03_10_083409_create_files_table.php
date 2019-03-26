<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->increments('fileNumber');
            $table->unsignedinteger('post_postNumber')->nullable()->index();
            $table->string('fileName');
            $table->unsignedinteger('bytes')->nullable();
            $table->string('mime')->nullable();
            $table->timestamps();
            
            $table->foreign('post_postNumber')->references('postNumber')->on('Posts')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('files');
    }
}
