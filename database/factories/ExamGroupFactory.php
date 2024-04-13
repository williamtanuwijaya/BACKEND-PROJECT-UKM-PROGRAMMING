<?php

namespace Database\Factories;

use App\Models\Exam;
use App\Models\ExamGroup;
use App\Models\ExamSession;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExamGroupFactory extends Factory
{
    
    protected $model = ExamGroup::class;

    public function definition()
    {
        return [
            'exams_id' => function () {
                return Exam::factory()->create()->id;
            },
            'exam_sessions_id' => function () {
                return ExamSession::factory()->create()->id;
            },
            'students_id' => function () {
                return Student::factory()->create()->id;
            },
        ];
    }
}
