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
        Schema::create('user_subscriptions', function (Blueprint $table) {
            $table->foreignId('user_id');
            $table->foreignId('product_pricing_id');
            $table->enum('status', ['Pending', 'Active', 'Inactive', 'Cancel'])->default('Pending');
            $table->timestamp('subscription_date');
            $table->timestamp('expiration_date');
            $table->primary(['user_id', 'product_pricing_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_subscriptions');
    }
};
