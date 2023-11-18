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
        Schema::create('variations', function (Blueprint $table) {
            $table->id();
            $table->String('referencia');
            $table->String('descripcion');
            $table->Decimal('precio');
            $table->unsignedBigInteger('product_id');
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade');            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('variations');
    }
};
