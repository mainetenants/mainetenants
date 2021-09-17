<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileUpdateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_info', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->string('phone')->nullable();
            $table->date('dob')->nullable();
            $table->string('city')->nullable();
            $table->string('gender')->nullable();
            $table->string('country')->nullable();
            $table->text('about_me')->nullable();
            $table->integer('user_id');
            $table->integer('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_info');
    }
}
