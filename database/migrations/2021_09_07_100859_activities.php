<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Activities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {    Schema::dropIfExists('msu_community_activities');
        Schema::create('msu_community_activities', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('content')->nullable();
            $table->text('images')->nullable();
            $table->text('videos')->nullable();
            $table->text('music')->nullable();
            $table->timestamp('created')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->integer('status');
            $table->integer('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('msu_community_activities');
    }
}
