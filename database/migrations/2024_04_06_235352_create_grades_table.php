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
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->foreignId("exams_id")->constrained();
            $table->foreignId("exam_sessions_id")->constrained();
            $table->foreignId("students_id")->constrained();
            $table->integer("duration");
            $table->dateTime("start_time");
            $table->dateTime("end_time");
            $table->integer("total_correct");
            $table->decimal("grade",total:5,places:2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grades');
    }
};
