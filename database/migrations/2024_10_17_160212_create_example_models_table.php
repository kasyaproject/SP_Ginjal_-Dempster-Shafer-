<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('example_models', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            // Ini untuk realation 1-1 dan 1-M
            $table->unsignedBigInteger('example_id');

            // Menyatakan foregin key
            $table->foreign('example_id')->references('id')->on('table_target');
            // Shorten way
            $table->foreignId('example_id')->constrained('table_target');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('example_models');
    }
};
