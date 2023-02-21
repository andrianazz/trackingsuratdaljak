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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('id_pegawai')->unique();
            $table->string('nama_user');
            $table->string('email_user');
            $table->string('username')->unique();
            $table->string('password');
            $table->timestamp('last_login')->nullable();
            $table->string('ip_address')->nullable();
            $table->enum('status_user', ['aktif', 'tidak_aktif']);
            $table->string('foto')->nullable();
            $table->string('role');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
