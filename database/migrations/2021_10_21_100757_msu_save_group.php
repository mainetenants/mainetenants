<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MsuSaveGroup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('msu_group', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('group_name');
            $table->string('group_category');
            $table->string('group_descripition');
            $table->string('only_see');
            $table->string('cover_image')->nullable();
            $table->string('profile_picture')->nullable();
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
        //
        Schema::dropIfExists('msu_group');

    }
}
