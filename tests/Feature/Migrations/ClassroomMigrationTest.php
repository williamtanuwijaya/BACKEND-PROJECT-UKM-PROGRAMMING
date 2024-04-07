<?php

namespace Tests\Feature\Migrations;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class ClassroomMigrationTest extends TestCase
{
    use RefreshDatabase;


    public function test_classrooms_table_exists()
    {
        $this->assertTrue(Schema::hasTable('classrooms'));
    }

    
    public function test_classrooms_table_columns_are_correct()
    {
        $expectedColumns = [
            'id',
            'title',
            'created_at',
            'updated_at',
        ];

        $actualColumns = Schema::getColumnListing('classrooms');
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
            $actualType = Schema::getColumnType('classrooms', $expectedColumn);
            $this->assertEquals($type, $actualType, "(Tabel Classroom) Kolom $expectedColumn seharusnya memiliki tipe data $actualType");
        }     
    }
}
