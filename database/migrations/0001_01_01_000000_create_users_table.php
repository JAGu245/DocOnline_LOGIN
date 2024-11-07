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
            $table->string('name');
            $table->string('nik')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        // Jika Anda ingin tetap memiliki tabel untuk reset password
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->id(); // Ganti dengan ID sebagai primary key
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Menggunakan user_id sebagai foreign key
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('password_reset_tokens'); // Pastikan ini ada di down
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('users');
    }
};
