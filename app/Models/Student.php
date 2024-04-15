<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Student extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function classroom() {
        return $this->belongsTo(Classroom::class,'classrooms_id');
    }

    public function grade() {
        return $this->hasMany(Grade::class,'students_id');
    }

    public function answer() {
        return $this->hasMany(Answer::class,'students_id');
    }

    public function examGroup() {
        return $this->hasMany(ExamGroup::class,'students_id');
    }

    protected $fillable = ['classrooms_id','nisn','name','password','gender'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'nisn_verified_at' => 'datetime',
    ];
}
