<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Genralsettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('msu_general_setting', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('night_mode')->default('0');
            $table->integer('notifications')->default('0');
            $table->integer('notification_sound')->default('0');
            $table->integer('my_profile')->default('0');
            $table->integer('show_profile')->default('0');
            $table->integer('status')->default('0');
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
        Schema::dropIfExists('msu_general_setting');
    }
}
