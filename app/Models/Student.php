<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public function classroom() {
        return $this->belongsTo(Classroom::class,'classrooms_id');
    }

    public function grade() {
        return $this->hasMany(Grade::class,'students_id');
    }

    public function answer() {
        return $this->hasMany(Answer::class,'students_id');
    }

    public function examGroup() {
        return $this->hasMany(ExamGroup::class,'students_id');
    }

    protected $fillable = ['classrooms_id','nisn','name','password','gender'];
}
