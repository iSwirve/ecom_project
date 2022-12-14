<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Chatdata extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chatdata', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('message');
            $table->bigInteger('id_chat')->unsigned();
            $table->foreign('id_chat')->references('id')->on('kontak')->onDelete('cascade');
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
        //
    }
}
