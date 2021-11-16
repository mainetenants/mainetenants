<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MsuGroupPost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('msu_group_post', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('group_id');     
            $table->integer('poll_id')->nullable();
            $table->string('title')->nullable();
            $table->string('content')->nullable();
            $table->string('images')->nullable();
            $table->string('music')->nullable();  
            $table->string('videos')->nullable();
            $table->string('likes');
            $table->string('dislikes');
            $table->integer('status');
            $table->timestamp('created')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('msu_group_post');  
    }
}
