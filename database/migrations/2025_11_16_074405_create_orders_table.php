<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('first_name');
            $table->string('last_name');
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

            $table->string('coupon')->nullable();
            $table->integer('coupon_discount')->nullable();

            $table->enum('status', ['pending', 'completed', 'delivered', 'canceled'])->default('pending');
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
