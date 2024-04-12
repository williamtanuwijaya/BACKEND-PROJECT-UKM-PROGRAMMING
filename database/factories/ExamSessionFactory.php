<?php 

    namespace Database\Factories;

use App\Models\Exam;
use App\Models\ExamSession;
    use Illuminate\Database\Eloquent\Factories\Factory;
    
    class ExamSessionFactory extends Factory
    {
        protected $model = ExamSession::class;
        protected static $id = 1;

        public function definition()
        {
            return [
                'id' =>static::$id++,
                'title' => $this->faker->sentence,
                'exams_id' => function () {
                    return Exam::factory()->create()->id;
                },
                'start_time' => $this->faker->dateTimeBetween('+1 week', '+2 week'),
                'end_time' => $this->faker->dateTimeBetween('+3 week', '+4 week'),
            ];
        }
    }
    
?>