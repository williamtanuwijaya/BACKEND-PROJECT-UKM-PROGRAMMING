<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class exam_sessions extends Model
{
    use HasFactory;

    public function exams()
    {
        return $this->belongsTo(exams::class,'exams_id');
    }

    public function exam_groups() 
    {
        return $this->hasMany(exam_groups::class,'exam_sessions');
    }

    public function grades() 
    {
        return $this->hasMany(answers::class,'exam_sessions');
    }

    public function answers() 
    {
        return $this->hasMany(answers::class,'exam_sessions');
    }

    protected $fillable = ['exams_id','title','start_time','end_time'];

}
