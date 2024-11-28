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
            $table->string('name', 10)->nullable(false);
            $table->string('email', 30)->unique()->nullable(false);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable(false);
            $table->string('image', 300);
            $table->string('job', 30);
            $table->string('introduction', 300);
            $table->integer('role')->nullable(false)->default(1);
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
