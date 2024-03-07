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
        Schema::create('invoice', function (Blueprint $table) {
            $table->id();
            $table->integer('invoiceno')->autoIncrement(false);
            $table->string('companyname');
            $table->string('cadd');
            $table->string('cemail');
            $table->integer('cgstin');
            $table->string('customername');
            $table->string('custadd');
            $table->string('custemail');
            $table->integer('custgstin');
            $table->decimal('amount');
            $table->decimal('taxamount');
            $table->decimal('totalamount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_invoice');
    }
};
