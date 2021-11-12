<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MsuCreatePoll extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('msu_create_poll', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('poll0')->nullable();
            $table->string('poll_category')->nullable();
            $table->string('expiry_time');
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
        Schema::dropIfExists('msu_create_poll');
    }
}
