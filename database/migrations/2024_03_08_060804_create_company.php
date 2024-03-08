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
        Schema::create('company', function (Blueprint $table) {
            $table->id();
            $table->string('companyname');
            $table->string('billingname');
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('gstin')->nullable();
            $table->string('currency')->nullable();
            $table->string('payment_terms')->nullable();
            $table->string('billing_contact_name')->nullable();
            $table->string('billing_contact_email')->nullable();
            $table->string('billing_contact_phone')->nullable();
            $table->string('website')->nullable();
            $table->string('industry')->nullable();
            $table->float('cgst-sgst')->nullable();
            $table->float('igst')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_account_number')->nullable();
            $table->string('bank_routing_number')->nullable();
            $table->string('logo')->nullable();
            $table->text('notes')->nullable();
            $table->text('terms_and_conditions')->nullable();
            $table->string('invoice_prefix')->nullable();
            $table->integer('default_invoice_due_days')->nullable();
            $table->string('billing_frequency')->nullable();
            $table->json('custom_fields')->nullable();
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('company');
    }
};
