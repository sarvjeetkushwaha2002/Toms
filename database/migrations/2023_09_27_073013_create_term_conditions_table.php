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
        Schema::create('term_conditions', function (Blueprint $table) {
            $table->id();
            $table->string('company_name')->nullable();
            $table->string('website_name')->nullable();
            $table->string('website_url')->nullable();
            $table->string('country_id')->nullable();
            $table->string('email')->nullable();
            $table->string('state_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('term_conditions');
    }
};
