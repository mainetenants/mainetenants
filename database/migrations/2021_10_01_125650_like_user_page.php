<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LikeUserPage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('like_user_page', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('page_id');
            $table->integer('friend_id');
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

        Schema::dropIfExists('like_user_page');
        //
    }
}
