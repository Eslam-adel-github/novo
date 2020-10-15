<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAnotherColoumToAttendEvents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('attend_events', function (Blueprint $table) {
            $table->enum('type',['registerd','invited'])->default('invited');
            $table->enum('status',['accepted','rejected'])->default('accepted');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('attend_events', function (Blueprint $table) {
            //
        });
    }
}
