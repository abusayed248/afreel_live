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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('username')->unique()->nullable();
            $table->boolean('is_activated')->default(0);
            $table->string('phone')->unique()->nullable();
            $table->string('job_title')->nullable();
            $table->string('job_type')->nullable();
            $table->string('job_category')->nullable();
            $table->integer('age')->nullable();
            $table->json('tag')->nullable();
            $table->string('language')->nullable();
            $table->string('school')->nullable();
            $table->string('school_passing_year')->nullable();
            $table->string('inter')->nullable();
            $table->string('inter_passing_year')->nullable();
            $table->string('graduation')->nullable();
            $table->string('graduation_passing_year')->nullable();
            $table->string('certified')->nullable();
            $table->string('photo')->nullable();
            $table->text('about_info')->nullable();
            $table->string('user_type')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
