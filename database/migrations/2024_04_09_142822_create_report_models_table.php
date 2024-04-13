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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('keterangan');
            $table->unsignedBigInteger('lokasi_id'); // Menggunakan unsignedBigInteger untuk menyesuaikan dengan kolom id di tabel 'lokasi'
            $table->unsignedBigInteger('tag_id');
            $table->unsignedBigInteger('user_id');
            $table->string('photo')->nullable();
            $table->smallInteger('status');
            $table->integer('vote')->nullable();
            $table->integer('solution_id')->nullable();
            $table->timestamps();

            $table->foreign('lokasi_id')->references('id')->on('lokasis')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tag_models');
    }
};
