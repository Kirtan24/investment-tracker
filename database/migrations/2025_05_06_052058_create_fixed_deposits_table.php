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
        Schema::create('fixed_deposits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('investment_id')->constrained()->onDelete('cascade');
            $table->string('bank_name');
            $table->string('fd_number')->nullable()->uniqid();
            $table->decimal('interest_rate', 5, 2);
            $table->date('start_date');
            $table->date('maturity_date');
            $table->enum('interest_type', ['simple', 'compound']);
            $table->enum('compounding_frequency', ['monthly', 'quarterly', 'half-yearly', 'yearly']);
            $table->boolean('is_tax_saver')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fixed_deposits');
    }
};
