<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    public function lesson()
    {
        return $this->belongsTo(Lesson::class,'lessons_id');
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class,'classrooms_id');
    }

    public function answer()
    {
        return $this->hasMany(Answer::class,'exams_id');
    }

    public function examSession()
    {
        return $this->hasMany(ExamSession::class,'exams_id');
    }

    public function examGroup()
    {
        return $this->hasMany(ExamGroup::class,'exams_id');
    }

    public function question()
    {
        return $this->hasMany(Question::class,'exams_id');
    }
    
    public function grade()
    {
        return $this->hasMany(Grade::class,'exams_id');
    }
    
    protected $fillable = ['title','lessons_id','classrooms_id','duration','description','random_question','random_answer','show_answer'];

}
