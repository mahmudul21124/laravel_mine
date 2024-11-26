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
        Schema::create('timetables', function (Blueprint $table) {
            $table->id();
            $table->integer('classroom_id');
            $table->integer('subject_id');
            $table->integer('teacher_id');
            $table->enum('day', ['Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday']);
            $table->dateTime('startTime');
            $table->dateTime('endTime');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('timetables');
    }
};
