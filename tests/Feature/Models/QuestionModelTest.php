<?php

namespace Tests\Unit\Models;

use App\Models\Answer;
use App\Models\Exam;
use App\Models\Question;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class QuestionModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_belongs_to_exam_relationship()
    {
        $exam = Exam::factory()->create();
        $question = Question::factory()->create(['exams_id' => $exam->id,]);

        $this->assertInstanceOf(Exam::class, $question->exam);
        $this->assertEquals($exam->id, $question->exam->id);
    }


    // JANGAN DIHAPUS!
    // public function test_has_many_answer_relationship()
    // {
    //     // Membuat data dummy untuk model Question
    //     $question = Question::factory()->create();
    //     $exam = Exam::factory()->create();

    //     $answer1 = Answer::factory()->create(['questions_id' => $question->id,'exams_id' => $exam->id]);
    //     $answer2 = Answer::factory()->create(['questions_id' => $question->id,'exams_id' => $exam->id]);
       
    //     $this->assertInstanceOf(Answer::class, $question->answer->first());
    //     $this->assertCount(2, $question->answer);
    //     $this->assertEquals($answer1->id, $question->answer->first()->id);
    //     $this->assertEquals($answer2->id, $question->answer->last()->id);
    // }

    public function test_fillable_fields()
    {
        $fillable = ['exams_id', 'question', 'option_1', 'option_2', 'option_3', 'option_4', 'option_5', 'answer'];
        $question = new Question();
        $this->assertEquals($fillable, $question->getFillable());
    }
}
