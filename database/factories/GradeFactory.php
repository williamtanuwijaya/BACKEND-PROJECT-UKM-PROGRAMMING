<?php

namespace Database\Factories;

use App\Models\Exam;
use App\Models\ExamSession;
use App\Models\Grade;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class GradeFactory extends Factory
{
    protected $model = Grade::class;

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
            'duration' => $this->faker->numberBetween(30, 120),
            'start_time' => $this->faker->dateTimeThisMonth(),
            'end_time' => $this->faker->dateTimeThisMonth(),
            'total_correct' => $this->faker->numberBetween(0, 100),
            'grade' => $this->faker->randomFloat(2, 0, 100),
        ];
    }
}
