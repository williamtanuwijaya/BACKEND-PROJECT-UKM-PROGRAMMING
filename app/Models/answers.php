<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class answers extends Model
{
    use HasFactory;

    protected $fillable = ['exams_id','exam_sessions_id','questions_id','students_id','question_order','answer_order','answer','is_correct'];
}
