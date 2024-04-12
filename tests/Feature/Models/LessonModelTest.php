<?php
namespace Tests\Feature\Models;

use App\Models\Exam;
use App\Models\Lesson;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LessonModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_has_many_exam_relationship()
    {
        $lesson = Lesson::factory()->create();
        $exam1 = Exam::factory()->create(['lessons_id' => $lesson->id]);
        $exam2 = Exam::factory()->create(['lessons_id' => $lesson->id]);
        
        $this->assertInstanceOf(Exam::class, $lesson->exam->first());
        $this->assertCount(2, $lesson->exam);
        $this->assertEquals($exam1->id, $lesson->exam->first()->id);
        $this->assertEquals($exam2->id, $lesson->exam->last()->id);
    }

    public function test_fillable_fields()
    {
        $fillable = ['title'];
        $lesson = new Lesson();
        $this->assertEquals($fillable, $lesson->getFillable());
    }
}
