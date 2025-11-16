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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            $table->string('user_name');
            $table->string('user_phone');
            $table->string('user_email');
            $table->string('country');
            $table->string('city');
            $table->string('governorate');
            $table->string('street');

            $table->string('notes')->nullable();

            $table->decimal('price', 8, 3);
            $table->decimal('shipping_price', 8, 3);
            $table->decimal('total_price', 8, 3);

            $table->enum('status', ['pending', 'completed','delivered', 'canceled'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
