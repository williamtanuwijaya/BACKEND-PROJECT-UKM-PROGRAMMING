<?php

namespace Tests\Feature\Migrations;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class ExamMigrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_exams_table_exists()
    {
        $this->assertTrue(Schema::hasTable('exams'));
    }

    public function test_all_columns_exist()
    {
        $expectedColumns = [
            'id',
            'title',
            'lessons_id',
            'classrooms_id',
            'duration',
            'description',
            'random_question',
            'random_answer',
            'show_answer',
            'created_at',
            'updated_at',
        ];

        $actualColumns = Schema::getColumnListing('exams');
        $this->assertEquals($expectedColumns, $actualColumns);
    }

    public function test_data_type_of_all_columns_are_correct()
    {
        $expectedColumns = [
            'id' => 'bigint',
            'title' => 'varchar',
            'lessons_id' => 'bigint',
            'classrooms_id' => 'bigint',
            'duration' => 'int',
            'description' => 'text',
            'random_question' => 'enum',
            'random_answer' => 'enum',
            'show_answer' => 'enum',
            'created_at' => 'timestamp',
            'updated_at' => 'timestamp',
        ];

        foreach($expectedColumns as $column => $type)
        {
            $actualType = Schema::getColumnType('exams', $column);
            $this->assertEquals($type, $actualType, "(Tabel Exam) Kolom $column seharusnya memiliki tipe data $actualType");
        }
    }
}
