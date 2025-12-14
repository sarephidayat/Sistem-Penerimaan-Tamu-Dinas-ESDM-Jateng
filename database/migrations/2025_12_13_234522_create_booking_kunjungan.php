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
        Schema::create('booking_kunjungan', function (Blueprint $table) {
            $table->id();

            $table->string('nama_lengkap');
            $table->string('nik', 20);
            $table->string('email');
            $table->string('no_hp', 20)->nullable();
            $table->string('instansi')->nullable();

            $table->foreignId('id_bidang')
                ->constrained('master_bidang')
                ->onDelete('cascade');

            $table->text('keperluan')->nullable();

            $table->date('tanggal_kunjungan');
            $table->time('jam_kunjungan')->nullable();

            $table->foreignId('id_status')
                ->constrained('master_status')
                ->onDelete('restrict');

            $table->text('catatan_admin')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('booking_kunjungan');
    }
};
