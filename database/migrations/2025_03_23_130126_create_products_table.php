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

            $table->string('title');
            $table->integer('quantity');
            $table->decimal('price');
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('category_id');

            $table->foreign('brand_id', 'product_brand_fk')->on('brands')->references('id');
            $table->foreign('category_id', 'product_category_fk')->on('categories')->references('id');

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
