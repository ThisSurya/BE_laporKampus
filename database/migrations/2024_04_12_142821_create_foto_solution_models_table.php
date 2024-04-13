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
        Schema::create('foto_solutions', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->unsignedBigInteger('solution_id');
            $table->timestamps();

            $table->foreign('solution_id')->references('id')->on('solutions')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foto_solution_models');
    }
};
