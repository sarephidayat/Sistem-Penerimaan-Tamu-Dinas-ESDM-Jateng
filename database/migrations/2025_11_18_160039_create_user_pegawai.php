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
        Schema::create('user_pegawai', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('username')->unique();
            $table->string('nip');
            $table->string('password');
            $table->string('nama_pegawai');

            // Foreign key ke tabel master_bidang dan status
            $table->foreignId('id_bidang')->nullable()->constrained('master_bidang')->onDelete('set null');
            $table->foreignId('id_jabatan')->nullable()->constrained('master_jabatan')->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_pegawai');
    }
};
