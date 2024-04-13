<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamSession extends Model
{
    use HasFactory;

    public function exam()
    {
        return $this->belongsTo(Exam::class,'exams_id');
    }

    public function examGroup() 
    {
        return $this->hasMany(ExamGroup::class,'exam_sessions_id');
    }

    public function grade() 
    {
        return $this->hasMany(Answer::class,'exam_sessions_id');
    }

    public function answer() 
    {
        return $this->hasMany(Answer::class,'exam_sessions_id');
    }

    protected $fillable = ['exams_id','title','start_time','end_time'];

}
