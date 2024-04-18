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
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('lesson_id');
            $table->foreign('lesson_id')->references('id')->on('lessons');
            $table->unsignedBigInteger('classroom_id');
            $table->foreign('classroom_id')->references('id')->on('classrooms');
            $table->integer('duration');
            $table->string('description');
            $table->datetime('start_time');
            $table->datetime('end_time');
            $table->enum('random_question', ['Y', 'N']);
            $table->enum('random_answer', ['Y', 'N']);
            $table->enum('show_answer', ['Y', 'N']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exams');
    }
};
