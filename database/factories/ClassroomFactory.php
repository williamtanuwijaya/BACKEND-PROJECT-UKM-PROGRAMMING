<?php 
namespace Database\Factories;

use App\Models\Classroom;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClassroomFactory extends Factory
{
  
    protected $model = Classroom::class;

    
    public function definition()
    {
        return [
            'title' => $this->faker->word, 
        ];
    }
}
?>