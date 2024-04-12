<?php 
namespace Database\Factories;

use App\Models\Classroom;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClassroomFactory extends Factory
{
  
    protected $model = Classroom::class;
    protected static $id = 1;
    
    public function definition()
    {
        return [
            'id' => static::$id++,
            'title' => $this->faker->word, 
        ];
    }
}
?>