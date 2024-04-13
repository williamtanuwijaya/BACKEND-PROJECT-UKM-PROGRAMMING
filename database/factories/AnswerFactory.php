<?php

namespace Database\Factories;

use App\Models\Answer;
use App\Models\Exam;
use App\Models\ExamSession;
use App\Models\Question;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnswerFactory extends Factory
{
   
    protected $model = Answer::class;

    public function definition()
    {
        return [
            'exams_id' => function () {
                return Exam::factory()->create()->id;
            },
            'exam_sessions_id' => function () {
                return ExamSession::factory()->create()->id;
            },
            'questions_id' => function () {
                return Question::factory()->create()->id;
            },
            'students_id' => function () {
                return Student::factory()->create()->id;
            },
            'question_order' => $this->faker->numberBetween(1, 20),
            'answer_order' => $this->faker->randomElement(['A', 'B', 'C', 'D', 'E']),
            'answer' => $this->faker->numberBetween(1, 5),
            'is_correct' => $this->faker->randomElement(['y', 'n']),
        ];
    }
}
