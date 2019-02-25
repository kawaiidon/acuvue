<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VideosInit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Illuminate\Support\Facades\Schema::create('videos', function (Blueprint $t){
            $t->increments('id');
            $t->string('title');
            $t->string('videoId');
            $t->text('desc');
            $t->string('share')->nullable()->default(null);
            $t->string('image')->nullable()->default(null);
            $t->timestamps();
        });
        \Illuminate\Support\Facades\Schema::table('votes', function (Blueprint $t){
            $t->dropColumn('video_id');
        });

        \Illuminate\Support\Facades\Schema::table('votes', function (Blueprint $t){
            $t->integer('video_id')->unsigned();
            $t->foreign('video_id')->references('id')->on('videos')->onDelete('RESTRICT');
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
