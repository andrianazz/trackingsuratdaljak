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
        Schema::create('verifikasi_surats', function (Blueprint $table) {
            $table->id();
            $table->string("nomor_surat");
            $table->string("nama_wp");
            $table->string("npwpd");
            $table->date("tgl_selesai_surat");
            $table->string("hasil_surat");
            $table->foreignId("surat_id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('verifikasi_surats');
    }
};
