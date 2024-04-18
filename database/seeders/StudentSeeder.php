<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('students')->insert([
            [
                'classroom_id' => 1,
                'nisn' => '2226250001',
                'name' => 'Tester',
                'gender' => 'L',
                'password' => Hash::make('123456'),
            ]
        ]);
    }
}
