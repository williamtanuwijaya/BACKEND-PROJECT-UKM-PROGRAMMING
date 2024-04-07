<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class ExamGroupMigrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_exam_groups_table_exists()
    {
        $this->assertTrue(Schema::hasTable('exam_groups'));
    }

    public function test_all_columns_exist()
    {
        $expectedColumns = [
            'id',
            'exams_id',
            'exam_sessions_id',
            'students_id',
            'created_at',
            'updated_at',
        ];

        $actualColumns = Schema::getColumnListing('exam_groups');
        $this->assertEquals($expectedColumns, $actualColumns);
    }

    public function test_data_type_of_all_columns_are_correct()
    {
        $expectedColumns = [
            'id' => 'bigint',
            'exams_id' => 'bigint',
            'exam_sessions_id' => 'bigint',
            'students_id' => 'bigint',
            'created_at' => 'timestamp',
            'updated_at' => 'timestamp',
        ];

        foreach($expectedColumns as $column => $type)
        {
            $actualType = Schema::getColumnType('exam_groups', $column);
            $this->assertEquals($type, $actualType, "(Tabel ExamGroup) Kolom $column seharusnya memiliki tipe data $actualType");
        }
    }
}
