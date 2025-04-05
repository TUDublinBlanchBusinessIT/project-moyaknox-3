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
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->unsignedBigInteger('bouquet_id')->nullable();
            $table->date('order_date')->nullable();
            $table->text('special_requests')->nullable();
            $table->timestamps();

                    // Foreign key for customer
            $table->foreign('customer_id')
                   ->references('id')
                   ->on('customers')
                   ->onDelete('set null');

  // Foreign key for bouquet
            $table->foreign('bouquet_id')
                   ->references('id')
                   ->on('bouquets')
                   ->onDelete('set null');
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
