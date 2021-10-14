<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Playlist extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('playlists', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('group_id');
            $table->integer('protection');
            $table->integer('embed_channel');
            $table->integer('hide_stream_url');
            $table->string('uid');
            $table->string('host');
            $table->string('username');
            $table->string('password');
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
