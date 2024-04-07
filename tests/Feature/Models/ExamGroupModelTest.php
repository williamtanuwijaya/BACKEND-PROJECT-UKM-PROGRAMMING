<?php

namespace Tests\Unit\Models;

use App\Models\Classroom;
use App\Models\Exam;
use App\Models\ExamGroup;
use App\Models\ExamSession;
use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExamGroupModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_belongs_to_exam_relationship()
    {
        $exam = Exam::factory()->create();
        $examGroup = ExamGroup::factory()->create(['exams_id' => $exam->id,]);

        $this->assertInstanceOf(Exam::class, $examGroup->exam);
        $this->assertEquals($exam->id, $examGroup->exam->id);
    }

    public function test_belongs_to_exam_session_relationship()
    {
        $examSession = ExamSession::factory()->create();
        $examGroup = ExamGroup::factory()->create(['exam_sessions_id' => $examSession->id,]);

        $this->assertInstanceOf(ExamSession::class, $examGroup->examSession);
        $this->assertEquals($examSession->id, $examGroup->examSession->id);
    }

    public function test_belongs_to_student_relationship()
    {
        $classroom = Classroom::factory()->create();
        $student = Student::factory()->create(['classrooms_id' => $classroom->id]);
        $examGroup = ExamGroup::factory()->create(['students_id' => $student->id]);


        $this->assertInstanceOf(Student::class, $examGroup->student);
        $this->assertEquals($student->id, $examGroup->student->id);
    }

    public function test_fillable_fields()
    {
        $fillable = ['exams_id', 'exam_sessions_id', 'students_id'];
        $examGroup = new ExamGroup();
        $this->assertEquals($fillable, $examGroup->getFillable());
    }
}
