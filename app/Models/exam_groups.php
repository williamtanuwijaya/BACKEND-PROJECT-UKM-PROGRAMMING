<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class exam_groups extends Model
{
    use HasFactory;

    protected $fillable = ['exams_id','exam_sessions_id','students_id'];
}
