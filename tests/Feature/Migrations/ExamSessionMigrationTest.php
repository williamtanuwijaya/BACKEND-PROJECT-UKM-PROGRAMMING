<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class ExamSessionMigrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_exam_sessions_table_exists()
    {
        $this->assertTrue(Schema::hasTable('exam_sessions'));
    }

    public function test_all_columns_exist()
    {
        $expectedColumns = [
            'id',
            'exams_id',
            'title',
            'start_time',
            'end_time',
            'created_at',
            'updated_at',
        ];

        $actualColumns = Schema::getColumnListing('exam_sessions');
        $this->assertEquals($expectedColumns, $actualColumns);
    }

    public function test_data_type_of_all_columns_are_correct()
    {
        $expectedColumns = [
            'id' => 'bigint',
            'exams_id' => 'bigint',
            'title' => 'varchar',
            'start_time' => 'datetime',
            'end_time' => 'datetime',
            'created_at' => 'timestamp',
            'updated_at' => 'timestamp',
        ];

        foreach($expectedColumns as $column => $type)
        {
            $actualType = Schema::getColumnType('exam_sessions', $column);
            $this->assertEquals($type, $actualType, "(Tabel ExamSession) Kolom $column seharusnya memiliki tipe data $actualType");
        }
    }
}
