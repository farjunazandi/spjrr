<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tes_rmibs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_siswa')->index();
            $table->unsignedBigInteger('id_kategori')->index();
            $table->unsignedBigInteger('id_soal')->index();
            $table->string('tipe_soal')->index();
            $table->double('bobot')->default(0);
            $table->timestamps();

            $table->foreign('id_siswa')->references('id')->on('siswas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_kategori')->references('id')->on('kategori_rmibs')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_soal')->references('id')->on('soal_rmibs')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tes_rmibs');
    }
};
