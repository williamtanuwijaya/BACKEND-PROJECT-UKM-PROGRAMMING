<?php

namespace Tests\Feature\Migrations;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class LessonMigrationTest extends TestCase
{
    use RefreshDatabase;


    public function test_lessons_table_exists()
    {
        $this->assertTrue(Schema::hasTable('lessons'));
    }


    public function test_lessons_table_columns_are_correct()
    {
        $expectedColumns = [
            'id',
            'title',
            'created_at',
            'updated_at',
        ];

        $actualColumns = Schema::getColumnListing('lessons');
        $this->assertEquals($expectedColumns, $actualColumns);
    }


    public function testdataTypeOfAllColumnAreCorrect()
    {
        $expectedColumns = [
            'id' => 'bigint',
            'title' => 'varchar',
            'created_at' => 'timestamp',
            'updated_at' => 'timestamp',
        ];

        foreach($expectedColumns as $expectedColumn => $type) 
        {
            $actualType = Schema::getColumnType('lessons', $expectedColumn);
            $this->assertEquals($type, $actualType, "(Tabel Lesson) Kolom $expectedColumn seharusnya memiliki tipe data $actualType");
        }
        
    }
}
