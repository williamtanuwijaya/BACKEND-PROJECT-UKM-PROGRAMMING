<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    public function grade()
    {
        return $this->hasOne(Grade::class);
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class,'lesson_id');
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class,'classroom_id');
    }

    public function question()
    {
        return $this->hasMany(Question::class,'exam_id');
    }

    protected $fillable = ['title','lesson_id','classroom_id','duration','description','random_question','random_answer','show_answer','start_time','end_time'];
}
