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
        Schema::create('kereta', function (Blueprint $table) {
            $table->id('kereta_id');
            $table->string('nama_kereta', 100);
            $table->string('kode_kereta', 255)->unique();
            $table->foreignId('rute_id')->nullable()->constrained('rute')->references('rute_id')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kereta');
    }
};
