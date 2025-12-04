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
        Schema::create('pengajuan_magang', function (Blueprint $table) {
            $table->id();
            $table->string('tracking_code', 20)->unique();
            $table->string('nama', 150);
            $table->string('universitas', 150);
            $table->string('jurusan', 150);
            $table->tinyInteger('semester')->unsigned();
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->string('surat_pdf', 255);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_magang');
    }
};
