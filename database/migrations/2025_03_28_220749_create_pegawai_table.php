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
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id('id_pegawai');
            $table->string('nama', 250);
            $table->string('nip', 50);
            $table->string('foto', 255)->nullable();
            
            // Kolom sambutan (hanya untuk kepala sekolah)
            $table->text('sambutan')->nullable();
            
            // Foreign Key
            $table->unsignedBigInteger('id_jabatan')->default(1); // Misalnya default ke jabatan pertama
            $table->foreign('id_jabatan')->references('id_jabatan')->on('jabatan')->onDelete('cascade');
        
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawai');
    }
};
