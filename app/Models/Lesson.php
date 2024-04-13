<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    public function exam() 
    {
        return $this->hasMany(Exam::class,'lessons_id');
    }

    protected $fillable = ['title'];
}
