<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Query\IndexHint;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('nilai_rapors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_siswa')->index();
            $table->unsignedBigInteger('id_mapel')->index();
            $table->double('semester1')->default(0);
            $table->double('semester2')->default(0);
            $table->double('rata_rata')->default(0);
            $table->timestamps();

            $table->foreign('id_siswa')->references('id')->on('siswas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_mapel')->references('id')->on('mata_pelajarans')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_rapors');
    }
};
