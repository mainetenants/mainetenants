<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserWorkEducation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('msu_user_work_education', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->integer('user_id')->nullable();
            $table->string('graduate')->nullable();
            $table->string('masters')->nullable();
            $table->string('studyat')->nullable();
            $table->text('description')->nullable();
            $table->date('fromdate')->nullable();
            $table->date('todate')->nullable();
            $table->text('city')->nullable();
            $table->date('date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('msu_user_work_education');
    }
}
