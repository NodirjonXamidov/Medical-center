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
        Schema::create('muolajas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            // $table->bigInteger('count');
            $table->bigInteger('price');
          
            $table->timestamps();

            // $table->foreign('price')->references('transactions')->on('price')->onDelete('cascade');

   
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('muolajas');
    }
};
