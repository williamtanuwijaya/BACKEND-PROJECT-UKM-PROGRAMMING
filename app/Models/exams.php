<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class exams extends Model
{
    use HasFactory;

    public function lessons()
    {
        return $this->belongsTo(lessons::class,'lessons_id');
    }

    public function classrooms()
    {
        return $this->belongsTo(classrooms::class,'classrooms_id');
    }

    public function answers()
    {
        return $this->hasMany(answers::class,'exams_id');
    }

    public function exam_sessions()
    {
        return $this->hasMany(exam_sessions::class,'exams_id');
    }

    public function exam_groups()
    {
        return $this->hasMany(exam_groups::class,'exams_id');
    }

    public function questions()
    {
        return $this->hasMany(questions::class,'exams_id');
    }
    
    public function grades()
    {
        return $this->hasMany(grades::class,'exams_id');
    }
    
    protected $fillable = ['title','lessons_id','classrooms_id','duration','description','random_question','random_answer','show_answer'];

}
