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
        Schema::create('creditnote', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('invoiceno');
            $table->string('credit_no');
            $table->string('companyname')->nullable();
            $table->string('customername')->nullable();
            $table->string('credit_suffix')->nullable();
            $table->string('on_account_received')->nullable();
            $table->decimal('cgst', 10, 2)->default(0.00);
            $table->decimal('sgst', 10, 2)->default(0.00);
            $table->decimal('igst', 10, 2)->default(0.00);
            $table->decimal('net_amount', 10, 2)->default(0.00);
            $table->date('credit_date');
            $table->text('remark')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('creditnote');
    }
};
