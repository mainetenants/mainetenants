<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MsuPageGroupComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('msu_page_group_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('post_id');
            $table->integer('group_id');
            $table->string('title');
            $table->string('comment');
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
        //
        Schema::dropIfExists('msu_page_group_comments');
    }
}
