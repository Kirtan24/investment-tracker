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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('investment_id')->constrained()->onDelete('cascade')->indexed();
            $table->string('ticker_symbol')->nullable();
            $table->enum('exchange', ['NSE', 'BSE', 'NYSE', 'NASDAQ']);
            $table->date('purchase_date');
            $table->integer('quantity');
            $table->decimal('purchase_price_per_unit', 15, 2);
            $table->string('broker_name')->nullable();
            $table->string('sector')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
