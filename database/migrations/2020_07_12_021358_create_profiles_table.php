<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('public_email', 45)->nullable();
            $table->date('birthday')->nullable();
            $table->tinyInteger('sex')->nullable();
            $table->string('second_email', 45)->nullable();
            $table->tinyInteger('privated')->default('0');
            $table->string('title')->nullable();
            $table->string('sub_title')->nullable();
            $table->text('about_me')->nullable();
            $table->string('avatar_link')->nullable();
            $table->string('background_link')->nullable();
            $table->string('web_site')->nullable();
            $table->string('phone', 45)->nullable();

            $table->index(["user_id"], 'user_id');
            $table->timestamps();
        });

        Schema::table('profiles', function($table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
