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
        Schema::create('submissions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->id();
            $table->foreignId('userId')->references('id')->on('userCredentials')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('businessId')->references('id')->on('userBusiness')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('locationId')->references('id')->on('locations')->onDelete('cascade')->onUpdate('cascade');
            $table->enum('status', ['pending', 'processed', 'approved', 'rejected'])->default('pending');
            $table->foreignId('reviewedBy')->references('id')->on('operatorCredentials')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submissions');
    }
};
