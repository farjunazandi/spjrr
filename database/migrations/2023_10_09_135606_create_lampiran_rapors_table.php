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
        Schema::create('lampiran_rapors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_siswa')->index();
            $table->string('file');
            $table->string('nama_file');
            $table->enum('submit', [0,1])->default(0);
            $table->timestamps();

            $table->foreign('id_siswa')->references('id')->on('siswas')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lampiran_rapors');
    }
};
