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
        Schema::create('bobot_rmibs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_alternatif')->index();
            $table->unsignedBigInteger('id_kategoriRmib')->index();
            $table->double('bobot');
            $table->timestamps();

            $table->foreign('id_alternatif')->references('id')->on('alternatifs')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_kategoriRmib')->references('id')->on('kategori_rmibs')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bobot_rmibs');
    }
};
