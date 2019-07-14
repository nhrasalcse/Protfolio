<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileBasicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_basics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('profession')->nullable();
            $table->string('about_me')->nullable();
            $table->string('skill')->nullable();
            $table->string('why_me')->nullable();
            $table->string('my_vision')->nullable();
            $table->string('service_content')->nullable();
            $table->string('project_content')->nullable();
            $table->string('work_education_content')->nullable();
            $table->string('blog_content')->nullable();
            $table->string('hire_content')->nullable();
            $table->string('client_content')->nullable();
            $table->string('header_cover_image')->nullable();
            $table->string('review_cover_image')->nullable();
            $table->string('user_id')->nullable();
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
        Schema::dropIfExists('profile_basics');
    }
}
