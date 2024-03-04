<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('client_id');
            $table->bigInteger('muolaja_id');
            $table->bigInteger('count');
            $table->bigInteger('price');

            $table->timestamps();

            // $table->foreign('client_id')->references('clients')->on('id')->onDelete('cascade');

        });
    }
   
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
