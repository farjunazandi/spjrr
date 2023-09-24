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
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('nisn')->unique();
            $table->unsignedBigInteger('id_kelas')->index();
            $table->string('nama');
            $table->enum('jenis_kelamin', [0,1])->default(0);
            $table->string('alamat', 500);
            $table->string('password');
            $table->string('default_password');
            $table->enum('ubah_password', [0,1])->default(0);
            $table->enum('aktif', [0,1])->default(0);
            $table->timestamps();

            //$table->foreign('id_kelas')->references('id')->on('kelas')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
