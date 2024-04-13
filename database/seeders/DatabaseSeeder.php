<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Answer;
use App\Models\Classroom;
use App\Models\Exam;
use App\Models\ExamGroup;
use App\Models\ExamSession;
use App\Models\Grade;
use App\Models\Lesson;
use App\Models\Question;
use App\Models\Student;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Hierarki
        // 1. classrooms, lessons
        // 2. students, exams
        // 3. exam_sessions, questions
        // 4. exam_groups, grades
        // 5. answers

        Classroom::factory()->count(30)->create();
        Lesson::factory()->count(30)->create();

        Student::factory()->count(30)->create();
        Exam::factory()->count(30)->create();

        ExamSession::factory()->count(30)->create();
        Question::factory()->count(30)->create();

        ExamGroup::factory()->count(30)->create();
        Grade::factory()->count(30)->create();

        Answer::factory()->count(30)->create();

    }
}
