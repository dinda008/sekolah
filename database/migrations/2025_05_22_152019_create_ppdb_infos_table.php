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
        Schema::create('ppdb_infos', function (Blueprint $table) {
            $table->id('id_ppdb');
            $table->string('poster')->nullable();    // path file poster
            $table->string('formulir')->nullable(); // path file formulir pendaftaran
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ppdb_infos');
    }
};
