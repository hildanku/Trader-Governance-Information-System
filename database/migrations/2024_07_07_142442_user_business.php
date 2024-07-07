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
        Schema::create('userBusiness', function (Blueprint $table) {
            $table->id();
            $table->foreignId('userId')->references('id')->on('userCredentials')->onDelete('cascade')->onUpdate('cascade');
            $table->string('businessName');
            $table->string('businessType');
            $table->string('businessOwner');
            $table->string('businessContactNumber');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('userBusiness');
    }
};
