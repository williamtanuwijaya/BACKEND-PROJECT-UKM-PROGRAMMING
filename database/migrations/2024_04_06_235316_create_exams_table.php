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
            $table->string("title");
            $table->foreignId("lessons_id")->constrained();;
            $table->foreignId("classrooms_id")->constrained();;
            $table->integer("duration");
            $table->text("description");
            $table->enum("random_question",['y','n']);
            $table->enum("random_answer",['y','n']);
            $table->enum("show_answer",['y','n']);

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
