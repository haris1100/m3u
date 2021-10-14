<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Channel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('channels', function (Blueprint $table) {
            $table->id();
            $table->string('no');
            $table->string('group_id')->nullable();
            $table->string('title')->nullable();
            $table->string('url')->nullable();
            $table->integer('tvg_id')->nullable();
            $table->string('tvg_name')->nullable();
            $table->string('tvg_language')->nullable();
            $table->string('tvg_country')->nullable();
            $table->integer('tvg_channel_number')->nullable();
            $table->string('logo')->nullable();
            $table->string('logo_small')->nullable();
            $table->string('audio_track')->nullable();
            $table->string('created_by');
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
        //
    }
}
