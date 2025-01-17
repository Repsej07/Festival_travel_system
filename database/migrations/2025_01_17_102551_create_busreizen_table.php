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
        Schema::create('busreizen', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('departure');
            $table->string('arrival');
            $table->date('departure_date');
            $table->date('arrival_date');
            $table->integer('departure_time');
            $table->integer('arrival_time');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('busreizen');
    }
};
