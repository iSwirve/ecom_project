<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Chat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat', function (Blueprint $table) {
            $table->id();
            $table->string('message');
            $table->string('pengirim');
            $table->string('penerima');
            $table->bigInteger('id_barang')->nullable();
            $table->foreign('pengirim')->references('email')->on('user')->onDelete('cascade');
            $table->foreign('penerima')->references('email')->on('user')->onDelete('cascade');
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
