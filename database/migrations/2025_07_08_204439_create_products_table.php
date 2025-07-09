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
        Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->json('name'); // multi bahasa
        $table->string('hs_code')->nullable();
        $table->string('cas_number')->nullable();
        $table->string('image')->nullable();
        $table->json('description')->nullable(); // multi bahasa
        $table->json('application')->nullable(); // multi bahasa
        $table->json('meta_title')->nullable();
        $table->json('meta_keyword')->nullable();
        $table->json('meta_description')->nullable();
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};