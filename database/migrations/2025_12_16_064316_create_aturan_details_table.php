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
        Schema::create('aturan_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('aturan_fuzzy_id');
            $table->foreign('aturan_fuzzy_id')->references('id')->on('aturan_fuzzies')->onDelete('cascade');
            $table->unsignedBigInteger('himpunan_fuzzy_id');
            $table->foreign('himpunan_fuzzy_id')->references('id')->on('himpunan_fuzzies')->onDelete('cascade');
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
        Schema::dropIfExists('aturan_details');
    }
};
