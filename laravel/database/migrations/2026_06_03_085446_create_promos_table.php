<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('promos', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->decimal('discount_amount', 10, 2)->nullable();
            $table->integer('discount_percent')->nullable();
            $table->string('type')->default('diskon'); // diskon / gratis
            $table->string('min_order')->nullable();
            $table->string('valid_until')->nullable();
            $table->string('color')->default('green'); // green / blue / amber / purple
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('promos');
    }
};