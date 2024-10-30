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
        Schema::create('buku_batas', function (Blueprint $table) {
            $table->id();
            $table->integer('guru')->nullable();
            $table->integer('jurusan_id');
            $table->integer('sub_kelas');
            $table->string('kelas');
            $table->string('matapelajaran');
            $table->string('file_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buku_batas');
    }
};
