<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ulasans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('produk_id')->constrained()->onDelete('cascade');
            $table->integer('rating');
            $table->text('komentar');
            $table->date('tanggal_ulasan');
            $table->foreign('transaksi_id')->references('id')->on('transaksis');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ulasans');
    }
};
