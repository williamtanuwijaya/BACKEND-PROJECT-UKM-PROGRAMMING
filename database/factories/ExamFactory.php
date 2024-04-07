<?php 

namespace Database\Factories;
use App\Models\Classroom;
use App\Models\Exam;
use App\Models\Lesson;
use Illuminate\Database\Eloquent\Factories\Factory;
    
    class ExamFactory extends Factory
    {
        protected $model = Exam::class;
    
        public function definition()
        {
            return [
                'title' => $this->faker->sentence,
                'lessons_id' => function () {
                    return Lesson::factory()->create()->id;
                },
                'classrooms_id' => function () {
                    return Classroom::factory()->create()->id;
                },
                'duration' => $this->faker->numberBetween(30, 120),
                'description' => $this->faker->paragraph,
                'random_question' => $this->faker->randomElement(['y', 'n']),
                'random_answer' => $this->faker->randomElement(['y', 'n']),
                'show_answer' => $this->faker->randomElement(['y', 'n']),
            ];
        }
    }
    
?>