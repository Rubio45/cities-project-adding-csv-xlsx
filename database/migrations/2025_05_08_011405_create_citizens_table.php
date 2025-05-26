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
        Schema::create('citizens', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->enum('gender', ['MASCULINO', 'FEMENINO'])->default('FEMENINO');
            $table->date('birth_date');
            //relacion con la tabla de ciudades
            $table->foreignId('city_id')->constrained('cities')->onDelete('cascade');

            // $table->unsignedBigInteger('city_id');
            // $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citizens');
    }
};
