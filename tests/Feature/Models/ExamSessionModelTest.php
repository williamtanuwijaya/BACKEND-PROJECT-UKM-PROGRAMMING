<?php

namespace Tests\Unit\Models;

use App\Models\Answer;
use App\Models\Exam;
use App\Models\ExamGroup;
use App\Models\ExamSession;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExamSessionModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_belongs_to_exam_relationship()
    {
        $exam = Exam::factory()->create();
        $examSession = ExamSession::factory()->create(['exams_id' => $exam->id]);

        $this->assertInstanceOf(Exam::class, $examSession->exam);
        $this->assertEquals($exam->id, $examSession->exam->id);
    }
    
    public function test_has_many_exam_group_relationship()
    {
        $examSession = ExamSession::factory()->create();
        $examgroup1 = ExamGroup::factory()->create(['exam_sessions_id' => $examSession->id]);
        $examgroup1 = ExamGroup::factory()->create(['exam_sessions_id' => $examSession->id]);

        $this->assertInstanceOf(ExamGroup::class, $examSession->examGroup->first());
        $this->assertCount(2, $examSession->examGroup);
    }

    public function test_has_many_grade_relationship()
    {
        $examSession = ExamSession::factory()->create();
        Answer::factory()->count(3)->create(['exam_sessions_id' => $examSession->id]);

        $this->assertInstanceOf(Answer::class, $examSession->grade->first());
        $this->assertCount(3, $examSession->grade);
    }

    public function test_has_many_answer_relationship()
    {
        $examSession = ExamSession::factory()->create();
        Answer::factory()->count(3)->create(['exam_sessions_id' => $examSession->id]);

        $this->assertInstanceOf(Answer::class, $examSession->answer->first());
        $this->assertCount(3, $examSession->answer);
    }

    public function test_fillable_fields()
    {
        $fillable = ['exams_id', 'title', 'start_time', 'end_time'];
        $examSession = new ExamSession();
        $this->assertEquals($fillable, $examSession->getFillable());
    }
}
