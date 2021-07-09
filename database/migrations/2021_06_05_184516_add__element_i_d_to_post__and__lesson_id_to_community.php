<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddElementIDToPostAndLessonIdToCommunity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('communities', function (Blueprint $table) {
            $table->integer('lesson_id')->nullable();

        });
        Schema::table('posts', function (Blueprint $table) {
            $table->integer('element_id')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

}
