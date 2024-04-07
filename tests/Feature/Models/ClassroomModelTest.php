<?php

namespace Tests\Unit\Models;

use App\Models\Classroom;
use App\Models\Student;
use App\Models\Exam;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ClassroomModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_has_many_students_relationship()
    {
        $classroom = Classroom::factory()->create();
        $student1 = Student::factory()->create(['classrooms_id' => $classroom->id]);
        $student2 = Student::factory()->create(['classrooms_id' => $classroom->id]);

        $this->assertInstanceOf(Student::class, $classroom->student->first());
        $this->assertCount(2, $classroom->student);
    }

    public function test_has_many_exams_relationship()
    {
        $classroom = Classroom::factory()->create();
        $exam1 = Exam::factory()->create(['classrooms_id' => $classroom->id]);
        $exam2 = Exam::factory()->create(['classrooms_id' => $classroom->id]);

        $this->assertInstanceOf(Exam::class, $classroom->exam->first());
        $this->assertCount(2, $classroom->exam);
    }

    // Pastikan semua kolom fillable ada
    public function test_fillable_fields()
    {
        $fillable = ['title'];
        $classroom = new Classroom();

        $this->assertEquals($fillable, $classroom->getFillable());
    }
}
