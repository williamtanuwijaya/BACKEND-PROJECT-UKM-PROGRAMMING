<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class GradeMigrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_grades_table_exists()
    {
        $this->assertTrue(Schema::hasTable('grades'));
    }

    public function test_all_columns_exist()
    {
        $expectedColumns = [
            'id',
            'exams_id',
            'exam_sessions_id',
            'students_id',
            'duration',
            'start_time',
            'end_time',
            'total_correct',
            'grade',
            'created_at',
            'updated_at',
        ];

        $actualColumns = Schema::getColumnListing('grades');
        $this->assertEquals($expectedColumns, $actualColumns);
    }

    public function test_data_type_of_all_columns_are_correct()
    {
        $expectedColumns = [
            'id' => 'bigint',
            'exams_id' => 'bigint',
            'exam_sessions_id' => 'bigint',
            'students_id' => 'bigint',
            'duration' => 'int',
            'start_time' => 'datetime',
            'end_time' => 'datetime',
            'total_correct' => 'int',
            'grade' => 'decimal',
            'created_at' => 'timestamp',
            'updated_at' => 'timestamp',
        ];

        foreach($expectedColumns as $column => $type)
        {
            $actualType = Schema::getColumnType('grades', $column);
            $this->assertEquals($type, $actualType, "(Tabel Grade) Kolom $column seharusnya memiliki tipe data $actualType");
        }
    }
}
