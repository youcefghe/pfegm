<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('title_en',100);
            $table->string('excerpt_en',350)->nullable();
            $table->text('description')->nullable();
            $table->text('header')->nullable();
            $table->text('recap')->nullable();
            $table->string('video_url',200)->nullable();
            $table->unsignedSmallInteger('nbr_hours');
            $table->unsignedSmallInteger('period');
            $table->date('begin_date');
            $table->text('target_students')->nullable();
             $table->string('front_image',200)->nullable();
            $table->boolean('featured')->default(false);
            $table->softDeletes();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('set null')
                ->onUpdate('set null');
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
        Schema::dropIfExists('courses');
    }
}
