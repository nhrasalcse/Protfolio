<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('language')->nullable();
            $table->string('details')->nullable();
            $table->string('project_category')->nullable();
            $table->string('image')->nullable();
            $table->string('project_url')->nullable();
            $table->string('date')->nullable();
            $table->string('customer')->nullable();
            $table->string('slug')->nullable();
            $table->string('delete_status')->default('1');
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
        Schema::dropIfExists('projects');
    }
}
