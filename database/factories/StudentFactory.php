<?php 
    // database/factories/StudentFactory.php

namespace Database\Factories;

use App\Models\Student;
use App\Models\Classroom;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
   
    protected $model = Student::class;

    public function definition()
    {
        // Ambil semua ID dari kelas yang ada di database
        $classroomIds = Classroom::pluck('id')->all();

        return [
            'classrooms_id' => $this->faker->randomElement($classroomIds),
            'nisn' => $this->faker->unique()->randomNumber(9),
            'name' => $this->faker->name,
            'password' => bcrypt('password'), //contoh ngab
            'gender' => $this->faker->randomElement(['l', 'p']),
            'created_at' => $this->faker->dateTimeBetween('-2 years', 'now'),
            'updated_at' => now(),
        ];
    }
}

?>