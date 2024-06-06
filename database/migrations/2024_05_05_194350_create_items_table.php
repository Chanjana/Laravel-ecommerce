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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('product_categories','id');
            $table->foreignId('user_id')->constrained('users','id');
            $table->string('title');
            $table->text('slug');
            $table->string('condition');
            $table->float('price');
            $table->longText('description');
            $table->json('images')->nullable();
            $table->boolean('availability')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
