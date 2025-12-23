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
        Schema::create('himpunan_fuzzies', function (Blueprint $table) {
            $table->id();
            $table->enum('nama_himpunan', ['rendah', 'sedang', 'tinggi']);
            $table->enum('kurva', ['naik', 'turun', 'segitiga', 'trapesium']);
            $table->float('a');
            $table->float('b');
            $table->float('c')->nullable();
            $table->float('d')->nullable();
            $table->unsignedBigInteger('kriteria_id');
            $table->foreign('kriteria_id')->references('id')->on('kriterias')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('himpunan_fuzzies');
    }
};
