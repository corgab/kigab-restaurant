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

        // Rimuovere i nullable che servono
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id(); 
            $table->string('name');
            $table->string('address');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->text('description')->nullable();

            // Immagine + ico
            $table->string('image_name')->nullable();
            $table->string('image_path')->nullable();
            
            $table->string('menu')->nullable();
            $table->text('map_link')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurants');
    }
};
