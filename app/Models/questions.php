<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class questions extends Model
{
    use HasFactory;

    public function exams()
    {
        return $this->belongsTo(exams::class,'exams_id');
    }

    public function answers() 
    {
        return $this->hasMany(answers::class,'questions_id');
    }

    protected $fillable = ['exams_id','question','option_1','option_2','option_3','option_4','option_5','answer'];
}
