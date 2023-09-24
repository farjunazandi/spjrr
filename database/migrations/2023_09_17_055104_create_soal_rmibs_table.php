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
        Schema::create('soal_rmibs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pekerjaan');
            $table->enum('tipe_soal', ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I'])->default('A');
            $table->enum('jenis_kelamin', [0,1])->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('soal_rmibs');
    }
};
