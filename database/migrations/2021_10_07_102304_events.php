<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Events extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('msu_events', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('create_event');
            $table->string('event_type');
            $table->string('event_name');
            $table->date('start_date');
            $table->time('start_time');
            $table->date('end_date');
            $table->time('end_time');
            $table->string('privacy')->nullable();
            $table->string('locations')->nullable();
            $table->string('event_link')->nullable();
            $table->string('description')->nullable();
            $table->string('cover_photo')->nullable();
            $table->string('co_host')->nullable();
            $table->integer('show_guest_list')->nullable();
            $table->integer('guest_invite')->nullable();
            $table->integer('admin_add_post')->nullable();
            $table->integer('post_approve')->nullable();
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
        Schema::dropIfExists('msu_events');
    }
}
