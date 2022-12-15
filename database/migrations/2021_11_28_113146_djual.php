<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Djual extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('djual', function (Blueprint $table) {
            $table->string("invoice_id");
            $table->foreign('invoice_id')->references('invoice_id')->on('hjual')->onDelete('cascade');

            $table->string('email_pembeli');
            $table->foreign('email_pembeli')->references('email')->on('user')->onDelete('cascade');
            $table->string('email_penjual');
            $table->unsignedBigInteger('id_barang');
            $table->foreign('id_barang')->references('id')->on('barang')->onDelete('cascade');
            $table->string('alamat');
            $table->integer('harga');
            $table->integer('is_complete');
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
        Schema::dropIfExists('djual');
    }
}
