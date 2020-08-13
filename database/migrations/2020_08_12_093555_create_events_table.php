<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string("event_name");
            $table->text("event_description");
            $table->unsignedBigInteger("event_type_id")->nullable();
            $table->text("tags")->nullable();
            $table->string("agenda")->nullable();
            $table->string("image")->nullable();
            $table->enum("participation",["doctor","public"]);
            $table->string("address")->nullable();
            $table->string('latitude', 200)->nullable();
            $table->string('longitude', 200)->nullable();
            $table->string('zoom', 200)->nullable();
            $table->date("event_date")->nullable();
            $table->foreign("event_type_id")->references("id")->on("event_types")->onDelete("set null");
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
        Schema::dropIfExists('events');
    }
}
