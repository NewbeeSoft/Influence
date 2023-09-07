<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColToSocialLinks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('social_links', function (Blueprint $table) {
            $table->string('fb_token')->nullable();
            $table->string('fb_page_id', 45)->nullable();
            $table->string('fb_page_name', 45)->nullable();
            $table->string('fb_page_token')->nullable();
            $table->string('fb_category', 45)->nullable();
            $table->string('ig_user_id', 45)->nullable();
            $table->string('ig_user_name', 45)->nullable();
            $table->string('ig_user_email', 45)->nullable();
            $table->string('ig_avatar_url', 45)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('social_links', function (Blueprint $table) {
            //
        });
    }
}
