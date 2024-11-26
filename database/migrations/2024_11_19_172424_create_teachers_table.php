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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->integer('designation_id');
            $table->integer('department_id')->nullable();
            $table->string('name', 100);
            $table->string('email', 50)->unique();
            $table->string('password');
            $table->date('dob');
            $table->enum('gender', ['male', 'female']);
            $table->string('address', 100);
            $table->string('phone', 20);
            $table->string('photo')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('inactive');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
