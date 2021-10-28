<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MsuGroupReplyComment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('msu_group_reply_comment', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('comment_id');
            $table->integer('post_id');
            $table->string('comment');  
            $table->string('is_active');
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
        Schema::dropIfExists('msu_group_reply_comment');     
    }
}
