<?php

namespace Tests\Unit\Models;

use App\Models\Answer;
use App\Models\Classroom;
use App\Models\Exam;
use App\Models\ExamSession;
use App\Models\Question;
use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AnswerModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_belongs_to_exam_relationship()
    {
        $exam = Exam::factory()->create();
        $answer = Answer::factory()->create(['exams_id' => $exam->id,]);

        $this->assertInstanceOf(Exam::class, $answer->exams);
        $this->assertEquals($exam->id, $answer->exams->id);
    }

    public function test_belongs_to_exam_session_relationship()
    {
        $examSession = ExamSession::factory()->create();
        $answer = Answer::factory()->create(['exam_sessions_id' => $examSession->id,]);

        $this->assertInstanceOf(ExamSession::class, $answer->examSession);
        $this->assertEquals($examSession->id, $answer->examSession->id);
    }

    public function test_belongs_to_question_relationship()
    {
        $question = Question::factory()->create();
        $answer = Answer::factory()->create(['questions_id' => $question->id,]);

        $this->assertInstanceOf(Question::class, $answer->questions);
        $this->assertEquals($question->id, $answer->questions->id);
    }

    public function test_belongs_to_student_relationship()
    {
        $classroom = Classroom::factory()->create();
        $student = Student::factory()->create(['classrooms_id' => $classroom->id]);
        $answer = Answer::factory()->create(['students_id' => $student->id]);

        $this->assertInstanceOf(Student::class, $answer->students);
        $this->assertEquals($student->id, $answer->students->id);
    }
}    