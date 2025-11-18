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
        Schema::create('master_nama', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('nama');

            // Foreign key ke tabel master_bidang dan status
            $table->foreignId('id_bidang')->nullable()->constrained('master_bidang')->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_nama');
    }
};
