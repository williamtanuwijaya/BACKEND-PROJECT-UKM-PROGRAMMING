<?php

namespace Tests\Feature\Migrations;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class StudentMigrationTest extends TestCase
{

    use RefreshDatabase;

    public function test_students_table_exists()
    {
        $this->assertTrue(Schema::hasTable('students'));
    }

    public function test_all_Columns_exist()
    {
        $expectedColumns = [
            'id',
            'classrooms_id',
            'nisn',
            'name',
            'password',
            'gender',
            'created_at',
            'updated_at',
        ];

        
        $actualColumns = Schema::getColumnListing('students');
        $this->assertEquals($expectedColumns, $actualColumns);
    }

    public function testdataTypeOfAllColumnAreCorrect()
    {
        $expectedColumns = [
            'id' => 'bigint',
            'classrooms_id' => 'bigint',
            'nisn' => 'bigint',
            'name' => 'varchar',
            'password' => 'varchar',
            'gender' => 'enum',
            'created_at' => 'timestamp',
            'updated_at' => 'timestamp',
        ];
    
        foreach($expectedColumns as $expectedColumn => $type) 
        {
            $actualType = Schema::getColumnType('students', $expectedColumn);
            $this->assertEquals($type, $actualType, "(Tabel Student) Kolom $expectedColumn seharusnya memiliki tipe data $actualType");
        }
    }

}
