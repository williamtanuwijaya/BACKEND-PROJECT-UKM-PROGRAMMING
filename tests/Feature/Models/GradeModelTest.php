<?php

namespace Tests\Feature\Models;

use App\Models\Classroom;
use App\Models\Exam;
use App\Models\ExamSession;
use App\Models\Grade;
use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GradeModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_belongs_to_exam_relationship()
    {
        $exam = Exam::factory()->create();
        $grade = Grade::factory()->create(['exams_id' => $exam->id,]);

        $this->assertInstanceOf(Exam::class, $grade->exam);
        $this->assertEquals($exam->id, $grade->exam->id);
    }

    public function test_belongs_to_exam_session_relationship()
    {
        $examSession = ExamSession::factory()->create();
        $grade = Grade::factory()->create(['exam_sessions_id' => $examSession->id,]);

        $this->assertInstanceOf(ExamSession::class, $grade->examSession);
        $this->assertEquals($examSession->id, $grade->examSession->id);
    }

    public function test_belongs_to_student_relationship()
    {
        $classroom = Classroom::factory()->create();
        $student = Student::factory()->create(['classrooms_id' => $classroom->id]);
        $grade = Grade::factory()->create(['students_id' => $student->id,]);

        $this->assertInstanceOf(Student::class, $grade->student);
        $this->assertEquals($student->id, $grade->student->id);
    }

    public function test_fillable_fields()
    {
        $fillable = ['exams_id', 'exam_sessions_id', 'students_id', 'duration', 'start_time', 'end_time', 'total_correct', 'grade'];
        $grade = new Grade();
        $this->assertEquals($fillable, $grade->getFillable());
    }
}
