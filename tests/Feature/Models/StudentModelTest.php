<?php

namespace Tests\Unit\Models;

use App\Models\Answer;
use App\Models\Classroom;
use App\Models\ExamGroup;
use App\Models\Grade;
use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StudentModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_belongs_to_classroom_relationship()
    {
        $classroom = Classroom::factory()->create();
        $student = Student::factory()->create(['classrooms_id' => $classroom->id,]);

        $this->assertInstanceOf(Classroom::class, $student->classroom);
        $this->assertEquals($classroom->id, $student->classroom->id);
    }

    public function test_has_many_grade_relationship()
    {
        $classroom = Classroom::factory()->create();
        $student = Student::factory()->create(['classrooms_id' => $classroom->id, ]);
        $grade1 = Grade::factory()->create(['students_id' => $student->id]);
        $grade2 = Grade::factory()->create(['students_id' => $student->id]);

        $this->assertInstanceOf(Grade::class, $student->grade->first());
        $this->assertCount(2, $student->grade);
        $this->assertEquals($grade1->id, $student->grade->first()->id);
        $this->assertEquals($grade2->id, $student->grade->last()->id);
    }

    public function test_has_many_answer_relationship()
    {
        $classroom = Classroom::factory()->create();
        $student = Student::factory()->create(['classrooms_id' => $classroom->id, ]);
        $answer1 = Answer::factory()->create(['students_id' => $student->id]);
        $answer2 = Answer::factory()->create(['students_id' => $student->id]);

        $this->assertInstanceOf(Answer::class, $student->answer->first());
        $this->assertCount(2, $student->answer);
        $this->assertEquals($answer1->id, $student->answer->first()->id);
        $this->assertEquals($answer2->id, $student->answer->last()->id);
    }

    public function test_has_many_exam_group_relationship()
    {
        $classroom = Classroom::factory()->create();
        $student = Student::factory()->create(['classrooms_id' => $classroom->id, ]);
        $examGroup1 = ExamGroup::factory()->create(['students_id' => $student->id]);
        $examGroup2 = ExamGroup::factory()->create(['students_id' => $student->id]);

        $this->assertInstanceOf(ExamGroup::class, $student->examGroup->first());
        $this->assertCount(2, $student->examGroup);
        $this->assertEquals($examGroup1->id, $student->examGroup->first()->id);
        $this->assertEquals($examGroup2->id, $student->examGroup->last()->id);
    }

    public function test_fillable_fields()
    {
        $fillable = ['classrooms_id', 'nisn', 'name', 'password', 'gender'];
        $student = new Student();
        $this->assertEquals($fillable, $student->getFillable());
    }
}
