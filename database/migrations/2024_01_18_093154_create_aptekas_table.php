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
        Schema::create('aptekas', function (Blueprint $table) {
            $table->id();
            $table ->string('name');
            $table ->bigInteger('price');
            $table ->bigInteger('count');
       

            // $table ->foreign('client_id')->references('client')->on('id')->onDelete('cascade');

            $table->timestamps();
        });
    }
  
    public function down(): void
    {
        Schema::dropIfExists('aptekas');
    }
};
