<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MsuInviteFriends extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('msu_invite_friends');
        Schema::create('msu_invite_friends', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id',11);
            $table->integer('friend_id',64);
            $table->integer('post_id');
            $table->integer('status',128);
            $table->integer('invitation_status');
            $table->integer('is_active');
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
        Schema::dropIfExists('msu_invite_friends');
    }
}
