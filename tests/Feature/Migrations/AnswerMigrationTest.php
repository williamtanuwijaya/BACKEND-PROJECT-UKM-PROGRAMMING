<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class AnswerMigrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_answers_table_exists()
    {
        $this->assertTrue(Schema::hasTable('answers'));
    }

    public function test_all_columns_exist()
    {
        $expectedColumns = [
            'id',
            'exams_id',
            'exam_sessions_id',
            'questions_id',
            'students_id',
            'question_order',
            'answer_order',
            'answer',
            'is_correct',
            'created_at',
            'updated_at',
        ];

        $actualColumns = Schema::getColumnListing('answers');
        $this->assertEquals($expectedColumns, $actualColumns);
    }

    public function test_data_type_of_all_columns_are_correct()
    {
        $expectedColumns = [
            'id' => 'bigint',
            'exams_id' => 'bigint',
            'exam_sessions_id' => 'bigint',
            'questions_id' => 'bigint',
            'students_id' => 'bigint',
            'question_order' => 'int',
            'answer_order' => 'varchar',
            'answer' => 'int',
            'is_correct' => 'enum',
            'created_at' => 'timestamp',
            'updated_at' => 'timestamp',
        ];

        foreach($expectedColumns as $column => $type)
        {
            $actualType = Schema::getColumnType('answers', $column);
            $this->assertEquals($type, $actualType, "(Tabel Answer) Kolom $column seharusnya memiliki tipe data $actualType");
        }
    }
}
