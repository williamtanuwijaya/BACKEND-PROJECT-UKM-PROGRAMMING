<?php

namespace Database\Factories;

use App\Models\Exam;
use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
{
    
    protected $model = Question::class;

    public function definition()
    {
        return [
            'exams_id' => function () {
                return Exam::factory()->create()->id;
            },
            'question' => $this->faker->sentence,
            'option_1' => $this->faker->sentence,
            'option_2' => $this->faker->sentence,
            'option_3' => $this->faker->sentence,
            'option_4' => $this->faker->sentence,
            'option_5' => $this->faker->sentence,
            'answer' => $this->faker->numberBetween(1, 5),
        ];
    }
}
