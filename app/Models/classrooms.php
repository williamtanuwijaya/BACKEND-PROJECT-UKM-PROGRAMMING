<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class classrooms extends Model
{
    use HasFactory;

    public function students() 
    {
        return $this->hasMany(students::class,'classrooms_id');
    }

    public function exams() 
    {
        return $this->hasMany(exams::class,'classrooms_id');
    }
    
    protected $fillable = ['title'];
}

