<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class exams extends Model
{
    use HasFactory;

    protected $fillable = ['title','lessons_id','classrooms_id','duration','description','random_question','random_answer','show_answer'];

}
