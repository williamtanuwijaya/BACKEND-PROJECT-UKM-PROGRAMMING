<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamGroup extends Model
{
    use HasFactory;
    
    public function exam()
    {
        return $this->belongsTo(Exam::class,'exams_id');
    }
    
    public function examSession()
    {
        return $this->belongsTo(ExamSession::class,'exam_sessions_id');
    }
    
    public function student()
    {
        return $this->belongsTo(Student::class,'students_id');
    }

    protected $fillable = ['exams_id','exam_sessions_id','students_id'];
}
