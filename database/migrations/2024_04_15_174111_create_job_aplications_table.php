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
        Schema::create('job_aplications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seller_id')->index()->constrained('users')->cascadeOnDelete();
            $table->foreignId('post_id')->index()->constrained('posts')->cascadeOnDelete();
            $table->longText('cover_letter')->nullable();
            $table->string('file')->nullable();
            $table->string('seller_deadline')->nullable();
            $table->string('seller_amount')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_aplications');
    }
};
