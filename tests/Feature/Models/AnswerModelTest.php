<?php

namespace Tests\Unit\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Answer;
use App\Models\Exam;
use App\Models\ExamSession;
use App\Models\Question;
use App\Models\Student;

class AnswerModelTest extends TestCase
{
    use RefreshDatabase;


    public function test_fillable_fields()
    {
        $fillable = ['exams_id', 'exam_sessions_id', 'questions_id', 'students_id', 'question_order', 'answer_order', 'answer', 'is_correct'];
        $answer = new Answer();
        $this->assertEquals($fillable, $answer->getFillable());
    }
}
