<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class questions extends Model
{
    use HasFactory;

    protected $fillable = ['exams_id','question','option_1','option_2','option_3','option_4','option_5','answer'];
}
