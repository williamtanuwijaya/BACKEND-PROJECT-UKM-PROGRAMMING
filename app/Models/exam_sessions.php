<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class exam_sessions extends Model
{
    use HasFactory;

    protected $fillable = ['exams_id','title','start_time','end_time'];

}
