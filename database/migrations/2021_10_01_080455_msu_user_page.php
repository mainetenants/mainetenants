<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MsuUserPage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('msu_user_page');
        Schema::create('msu_user_page', function (Blueprint $table) {
            $table->increments('msu_user_page_id');
            $table->integer('user_id');
            $table->string('page_info')->nullable();
            $table->string('page_category');
            $table->string('page_descripition');
            $table->string('profile_image')->nullable();
            $table->string('cover_image')->nullable();
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
        Schema::dropIfExists('msu_user_page');
      
    }
}
