<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->string('nim', 12)->primary();
            $table->string('nama', 50);
            $table->string('jenis_kelamin', 10);
            $table->string('kota_kelahiran', 30);
            $table->date('tanggal_kelahiran');
            $table->text('alamat');
            $table->string('program_studi', 20);
            $table->string('tahun_masuk', 4);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa');
    }
};
