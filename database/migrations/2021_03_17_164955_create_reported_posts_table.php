<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportedPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reported_posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_id');
            $table->foreign('post_id')->references('id')->on('posts');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('community_id');
            $table->foreign('community_id')->references('id')->on('communities');
            $table->string('details');
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
        Schema::dropIfExists('reported_posts');
    }
}
