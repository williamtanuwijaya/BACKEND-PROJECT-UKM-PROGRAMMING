<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lessons extends Model
{
    use HasFactory;

    public function exams() 
    {
        return $this->hasMany(exams::class,'lessons_id');
    }

    protected $fillable = ['title'];
}
