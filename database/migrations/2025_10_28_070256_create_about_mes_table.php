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
        Schema::create('about_mes', function (Blueprint $table) {
            $table->id();
            // Info Dasar
            $table->string('full_name');
            $table->string('title')->nullable(); // Contoh: "Full-Stack Developer"
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            
            // Foto Profil
            $table->string('photo_url')->nullable(); 
            
            // Ringkasan/Bio
            $table->longText('summary'); 
            
            // Skill (Jika ingin di-update sebagai teks, opsional)
            $table->text('key_skills')->nullable(); // Daftar skill utama
            
            // Link Media Sosial
            $table->string('linkedin_url')->nullable();
            $table->string('github_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_mes');
    }
};
