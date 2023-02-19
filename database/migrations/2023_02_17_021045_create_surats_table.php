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
        Schema::create('surats', function (Blueprint $table) {
            $table->id();
            $table->string("no");
            $table->string("indeks_surat");
            $table->timestamp("tgl_masuk");
            $table->foreignId('bidang_id');
            $table->string("nama_pemohon");
            $table->foreignId("jenis_surat_id");
            $table->foreignId("sub_bidang_id");
            $table->timestamp("tgl_selesai")->nullable();
            $table->integer("status_surat");
            $table->string("catatan");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surats');
    }
};
