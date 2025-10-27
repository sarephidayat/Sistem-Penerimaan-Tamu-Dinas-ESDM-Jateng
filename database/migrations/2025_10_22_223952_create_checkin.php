<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('checkin', function (Blueprint $table) {
            $table->id();
            $table->string('email')->nullable();
            $table->string('nama_lengkap');
            $table->string('nik', 20);
            $table->string('instansi')->nullable();
            $table->string('no_hp', 20)->nullable();
            $table->string('bidang_tujuan')->nullable();
            $table->text('keperluan')->nullable();
            $table->string('foto_selfie')->nullable();
            $table->timestamp('waktu_masuk')->nullable();

            // Foreign key ke tabel master_bidang dan status
            $table->foreignId('master_bidang_id')->nullable()->constrained('master_bidang')->onDelete('set null');
            $table->foreignId('status_id')->nullable()->constrained('status')->onDelete('set null');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('checkin');
    }
};
