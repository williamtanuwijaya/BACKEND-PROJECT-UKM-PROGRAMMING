<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    public function exam()
    {
        return $this->belongsTo(Exam::class,'exams_id');
    }

    public function answer() 
    {
        return $this->hasMany(Answer::class,'questions_id');
    }

    protected $fillable = ['exams_id','question','option_1','option_2','option_3','option_4','option_5','answer'];
}
