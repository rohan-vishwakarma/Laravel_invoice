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
        Schema::table("users", function (Blueprint $table) {

            $table->string("otp")->default(0);
            $table->string("otp_verified")->default(0);

        });
    }

    public function down(): void
    {
        //
    }
};
