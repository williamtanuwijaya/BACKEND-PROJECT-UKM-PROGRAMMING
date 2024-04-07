<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class answers extends Model
{
    use HasFactory;

    public function exams()
    {
        return $this->belongsTo(exams::class,'exams_id');
    }
    
    public function exam_sessions()
    {
        return $this->belongsTo(exam_sessions::class,'exams_id');
    }
    
    public function questions()
    {
        return $this->belongsTo(questions::class,'questions_id');
    }
    
    public function students()
    {
        return $this->belongsTo(students::class,'students_id');
    }
    
    protected $fillable = ['exams_id','exam_sessions_id','questions_id','students_id','question_order','answer_order','answer','is_correct'];
}
