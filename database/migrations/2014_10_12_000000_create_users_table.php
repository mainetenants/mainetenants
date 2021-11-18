<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   Schema::dropIfExists('users');
        Schema::create('users', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->string('name',32);
            $table->string('email',64)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password',128);
            $table->integer('gender');
            $table->rememberToken();
            $table->string('device_token')->nullable();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo', 2048)->nullable();
            $table->string('cover_photo', 2048)->nullable();
            $table->integer('night_mode')->nullable();
            $table->integer('notification')->nullable();
            $table->integer('notificaiton_sound')->nullable();
            $table->integer('my_profile')->nullable();
            $table->integer('show_profile')->nullable();
            $table->integer('show_me_online')->nullable();
            $table->integer('sub_users')->nullable();
            $table->integer('personal_account')->nullable();
            $table->integer('bussiness_account')->nullable();
            $table->integer('delete_history')->nullable();
            $table->integer('expose_author_name')->nullable();

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
        Schema::dropIfExists('users');
    }
}
