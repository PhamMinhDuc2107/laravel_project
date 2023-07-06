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
            $table->increments("id");
            $table->integer("customer_id");
            $table->integer("shipping_id");
            $table->integer("quantity");
            $table->bigInteger("total");
            $table->date("date");
            $table->integer("order_status");
            $table->integer("coupon_id");
            $table->bigInteger("feeship");
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