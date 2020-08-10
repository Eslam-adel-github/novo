<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string("phone")->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->tinyInteger('type')->default(2);
            $table->string('lat')->nullable();
            $table->string("lang")->nullable();
            $table->string("zoom")->nullable();
            $table->string("prefered_contacts")->nullable();
            $table->string('image')->nullable();
            $table->enum('gender',['male','female']);
            $table->string('password');
            $table->string('api_token', 80)->unique()->nullable()->default(null);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
