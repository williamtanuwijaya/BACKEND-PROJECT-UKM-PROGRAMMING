<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class QuestionMigrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_questions_table_exists()
    {
        $this->assertTrue(Schema::hasTable('questions'));
    }

    public function test_all_columns_exist()
    {
        $expectedColumns = [
            'id',
            'exams_id',
            'question',
            'option_1',
            'option_2',
            'option_3',
            'option_4',
            'option_5',
            'answer',
            'created_at',
            'updated_at',
        ];

        $actualColumns = Schema::getColumnListing('questions');
        $this->assertEquals($expectedColumns, $actualColumns);
    }

    public function test_data_type_of_all_columns_are_correct()
    {
        $expectedColumns = [
            'id' => 'bigint',
            'exams_id' => 'bigint',
            'question' => 'text',
            'option_1' => 'text',
            'option_2' => 'text',
            'option_3' => 'text',
            'option_4' => 'text',
            'option_5' => 'text',
            'answer' => 'int',
            'created_at' => 'timestamp',
            'updated_at' => 'timestamp',
        ];

        foreach($expectedColumns as $column => $type)
        {
            $actualType = Schema::getColumnType('questions', $column);
            $this->assertEquals($type, $actualType, "(Tabel Question) Kolom $column seharusnya memiliki tipe data $actualType");
        }
    }
}
