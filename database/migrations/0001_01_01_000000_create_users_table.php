<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('role', [
                'admin',
                'owner',
                'engineering',
                'kepala_wh',
                'sopir',
                'mandor',
                'tukang',
            ])->default('tukang');
            $table->boolean('is_active')->default(true);
            $table->string('phone')->nullable();
            $table->string('warehouse_id')->nullable(); // untuk kepala_wh, tukang, mandor
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};