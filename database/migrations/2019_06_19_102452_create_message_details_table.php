<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessageDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('msg_id')->nullable();
            $table->string('msg_description')->nullable();
            $table->string('sender_id')->nullable();
            $table->string('receive_id')->nullable();
            $table->string('seen_status')->nullable();
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
        Schema::dropIfExists('message_details');
    }
}
