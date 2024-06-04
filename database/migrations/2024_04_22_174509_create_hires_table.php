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
        Schema::create('hires', function (Blueprint $table) {
            $table->id();
            $table->foreignId('buyer_id')->index()->constrained('users')->cascadeOnDelete();
            $table->foreignId('seller_id')->index()->constrained('users')->cascadeOnDelete();
            $table->foreignId('aplicant_id')->index()->constrained('job_aplications')->cascadeOnDelete();
            $table->integer('post_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hires');
    }
};
