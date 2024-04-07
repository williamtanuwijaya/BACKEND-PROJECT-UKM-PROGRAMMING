<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class grades extends Model
{
    use HasFactory;

    protected $fillable = ['exams_id','exam_sessions_id','students_id','duration','start_time','end_time','total_correct','grade'];
}
