<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TmpChannels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tmp_channels', function (Blueprint $table) {
            $table->id();
            $table->string('group_title');
            $table->string('title')->nullable();
            $table->string('url')->nullable();
            $table->string('tvg_id')->nullable();
            $table->string('tvg_name')->nullable();
            $table->string('tvg_language')->nullable();
            $table->string('tvg_country')->nullable();
            $table->string('logo')->nullable();
            $table->string('created_by');
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
