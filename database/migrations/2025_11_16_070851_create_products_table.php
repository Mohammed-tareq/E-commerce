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
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->string('small_desc');
            $table->longText('desc');
            $table->boolean('status')->default(true);
            $table->string('sku');
            $table->date('available_for')->nullable();
            $table->integer('views')->default(0);

            $table->boolean('has_variants')->default(0);
            $table->decimal('price', 8, 3)->nullable();
            $table->boolean('has_discount')->default(0);
            $table->decimal('discount')->nullable();
            $table->date('discount_start')->nullable();
            $table->date('discount_end')->nullable();

            $table->boolean('manage_stock')->default(false);
            $table->integer('qty')->nullable();
            $table->integer('available_qty')->default(1);

            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->foreignId('brand_id')->constrained()->cascadeOnDelete();
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
