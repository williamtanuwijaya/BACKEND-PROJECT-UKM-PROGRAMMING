<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class Student extends Model
{
    use HasFactory;

    public function classroom() {
        return $this->belongsTo(Classroom::class,'classroom_id');
    }

    public function grade() {
        return $this->hasMany(Grade::class,'student_id');
    }

    protected $fillable = ['classroom_id','nisn','name','password','gender'];
}
