<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryIdToYoutubeVideos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('youtube_videos', function (Blueprint $table) {
            $table->unsignedBigInteger("category_video_id")->nullable();
            $table->foreign("category_video_id")->references('id')->on('category_videos')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('youtube_videos', function (Blueprint $table) {
            //
        });
    }
}
