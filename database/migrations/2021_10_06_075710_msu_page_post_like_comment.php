<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MsuPagePostLikeComment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('msu_page_post_like_comment', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('comment_id');
            $table->integer('comment');
            $table->integer('post_id');
            $table->integer('is_like');
            $table->integer('is_active');
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
        Schema::dropIfExists('msu_page_post_like_comment');
    }
}
