<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class grades extends Model
{
    use HasFactory;

    public function exams()
    {
        return $this->belongsTo(exams::class,'exams_id');
    }

    public function exam_sessions()
    {
        return $this->belongsTo(exam_sessions::class,'exam_sessions_id');
    }

    public function students()
    {
        return $this->belongsTo(students::class,'students_id');
    }


    protected $fillable = ['exams_id','exam_sessions_id','students_id','duration','start_time','end_time','total_correct','grade'];
}
