<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    public function exams()
    {
        return $this->belongsTo(Exam::class,'exams_id');
    }
    
    public function examSession()
    {
        return $this->belongsTo(ExamSession::class,'exam_sessions_id');
    }
    
    public function questions()
    {
        return $this->belongsTo(Question::class,'questions_id');
    }
    
    public function students()
    {
        return $this->belongsTo(Student::class,'students_id');
    }
    
    protected $fillable = ['exams_id','exam_sessions_id','questions_id','students_id','question_order','answer_order','answer','is_correct'];
}
