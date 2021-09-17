<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MsuAccountSetting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('msu_account_setting', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->integer('user_id');
            $table->integer('sub_users')->default('0');
            $table->integer('enable_follow_me')->default('0');
            $table->integer('send_me_notifications')->default('0');
            $table->integer('text_messages')->default('0');
            $table->integer('enable_tagging')->default('0');
            $table->integer('enable_sound_notification')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('msu_account_setting');
    }
}
