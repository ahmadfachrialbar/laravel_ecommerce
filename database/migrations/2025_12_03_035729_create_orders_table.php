<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            // User
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();

            // Identitas penerima
            $table->string('order_number')->unique();
            $table->string('full_name');
            $table->string('phone');
            $table->text('address');

            // Lokasi & snapshot
            $table->unsignedBigInteger('province_id')->nullable();
            $table->string('province_name')->nullable();

            $table->unsignedBigInteger('city_id')->nullable();
            $table->string('city_name')->nullable();

            $table->unsignedBigInteger('district_id')->nullable();
            $table->string('district_name')->nullable();

            $table->string('postal_code')->nullable();

            // Pengiriman
            $table->string('courier')->nullable();
            $table->integer('weight')->default(0);

            // Harga
            $table->decimal('subtotal', 10, 2)->default(0);
            $table->decimal('shipping_cost', 10, 2)->default(0);
            $table->decimal('total', 10, 2)->default(0);

            // Status
            $table->string('shipping_status')->default('pending');
            $table->string('status')->default('pending'); 
            $table->string('payment_status')->default('unpaid');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
