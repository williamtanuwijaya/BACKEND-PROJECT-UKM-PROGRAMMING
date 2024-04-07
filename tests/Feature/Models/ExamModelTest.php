<?php

namespace Tests\Unit\Models;

use App\Models\Answer;
use App\Models\Classroom;
use App\Models\Exam;
use App\Models\ExamGroup;
use App\Models\ExamSession;
use App\Models\Grade;
use App\Models\Lesson;
use App\Models\Question;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExamModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_belongs_to_lesson_relationship()
    {
        $lesson = Lesson::factory()->create();
        $exam = Exam::factory()->create(['lessons_id' => $lesson->id]);

        $this->assertInstanceOf(Lesson::class, $exam->lesson);
        $this->assertEquals($lesson->id, $exam->lesson->id);
    }

    public function test_belongs_to_classroom_relationship()
    {
        $classroom = Classroom::factory()->create();
        $exam = Exam::factory()->create(['classrooms_id' => $classroom->id]);

        $this->assertInstanceOf(Classroom::class, $exam->classroom);
        $this->assertEquals($classroom->id, $exam->classroom->id);
    }

    public function test_has_many_answer_relationship()
    {
        $exam = Exam::factory()->create();
        $answer1 = Answer::factory()->create(['exams_id' => $exam->id]);
        $answer2 = Answer::factory()->create(['exams_id' => $exam->id]);

        $this->assertInstanceOf(Answer::class, $exam->answer->first());
        $this->assertCount(2, $exam->answer);
        $this->assertEquals($answer1->id, $exam->answer->first()->id);
        $this->assertEquals($answer2->id, $exam->answer->last()->id);
    }

    public function test_has_many_exam_session_relationship()
    {
        $exam = Exam::factory()->create();
        $examSession1 = ExamSession::factory()->create(['exams_id' => $exam->id]);
        $examSession2 = ExamSession::factory()->create(['exams_id' => $exam->id]);

        $this->assertInstanceOf(ExamSession::class, $exam->examSession->first());
        $this->assertCount(2, $exam->examSession);
        $this->assertEquals($examSession1->id, $exam->examSession->first()->id);
        $this->assertEquals($examSession2->id, $exam->examSession->last()->id);
    }

    public function test_has_many_exam_group_relationship()
    {
        $exam = Exam::factory()->create();
        $examGroup1 = ExamGroup::factory()->create(['exams_id' => $exam->id]);
        $examGroup2 = ExamGroup::factory()->create(['exams_id' => $exam->id]);

        $this->assertInstanceOf(ExamGroup::class, $exam->examGroup->first());
        $this->assertCount(2, $exam->examGroup);
        $this->assertEquals($examGroup1->id, $exam->examGroup->first()->id);
        $this->assertEquals($examGroup2->id, $exam->examGroup->last()->id);
    }

    public function test_has_many_question_relationship()
    {
        $exam = Exam::factory()->create();
        $question1 = Question::factory()->create(['exams_id' => $exam->id]);
        $question2 = Question::factory()->create(['exams_id' => $exam->id]);

        $this->assertInstanceOf(Question::class, $exam->question->first());
        $this->assertCount(2, $exam->question);
        $this->assertEquals($question1->id, $exam->question->first()->id);
        $this->assertEquals($question2->id, $exam->question->last()->id);
    }

    public function test_has_many_grade_relationship()
    {
        $exam = Exam::factory()->create();
        $grade1 = Grade::factory()->create(['exams_id' => $exam->id]);
        $grade2 = Grade::factory()->create(['exams_id' => $exam->id]);

        $this->assertInstanceOf(Grade::class, $exam->grade->first());
        $this->assertCount(2, $exam->grade);
        $this->assertEquals($grade1->id, $exam->grade->first()->id);
        $this->assertEquals($grade2->id, $exam->grade->last()->id);
    }

    public function test_fillable_fields()
    {
        $fillable = ['title', 'lessons_id', 'classrooms_id', 'duration', 'description', 'random_question', 'random_answer', 'show_answer'];
        $exam = new Exam();
        $this->assertEquals($fillable, $exam->getFillable());
    }
}
