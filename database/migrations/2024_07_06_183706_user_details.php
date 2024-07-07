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
        Schema::create('userdetails', function (Blueprint $table) {
            $table->id();
            // $table->ForeignId('userId')->constrained('userCredentials')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('userId')->references('id')->on('userCredentials')->onDelete('cascade')->onUpdate('cascade');
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->text('address')->nullable();
            $table->string('homePhoneNumber')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('userdetails');
    }
};
