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
            $table->increments("id");
            $table->string("name", 255);
            $table->string("description", 4000);
            $table->text("content");
            $table->string("photo", 255);
            $table->bigInteger("price");
            $table->integer("discount");
            $table->integer("category_id");
            $table->integer("brand_id");
            $table->integer("hot");
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