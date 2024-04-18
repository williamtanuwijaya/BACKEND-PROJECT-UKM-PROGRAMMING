<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    public function student() 
    {
        return $this->hasMany(Student::class,'classroom_id');
    }

    public function exam() 
    {
        return $this->hasMany(Exam::class,'classroom_id');
    }
    
    protected $fillable = ['title'];
}
