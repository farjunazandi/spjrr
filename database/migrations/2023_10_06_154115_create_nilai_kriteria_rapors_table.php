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
        Schema::create('nilai_kriteria_rapors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_siswa')->index();
            $table->unsignedBigInteger('id_kriteria')->index();
            $table->double('nilai')->default(0);
            $table->timestamps();

            $table->foreign('id_siswa')->references('id')->on('siswas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_kriteria')->references('id')->on('kriterias')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_kriteria_rapors');
    }
};
