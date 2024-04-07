<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class students extends Model
{
    use HasFactory;

    public function classrooms() {
        return $this->belongsTo(classrooms::class,'classrooms_id');
    }

    public function grades() {
        return $this->hasMany(grades::class,'students_id');
    }

    public function answers() {
        return $this->hasMany(answers::class,'students_id');
    }

    public function exam_groups() {
        return $this->hasMany(exam_groups::class,'students_id');
    }

    protected $fillable = ['classrooms_id','nisn','name','password','gender'];
}
