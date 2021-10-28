<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LikesDislikes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('msu_like_dislike_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('post_id');
            $table->integer('like_dislike');
            $table->string('reaction',11);
            $table->timestamp('created')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
        Schema::create('msu_like_dislike_events', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('post_id');
            $table->integer('like_dislike');
            $table->string('reaction',11);
            $table->timestamp('created')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('msu_like_dislike_posts');
        Schema::dropIfExists('msu_like_dislike_events');
    }
}
