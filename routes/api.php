<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\QuestionController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//classrooms
Route::get('classrooms', [ClassroomController::class, 'index'])->name('classrooms.index');
Route::get('classrooms/{classroom}', [ClassroomController::class, 'show'])->name('classrooms.show');
Route::post('classrooms', [ClassroomController::class, 'store'])->name('classrooms.store');
Route::put('classrooms/{classroom}', [ClassroomController::class, 'update'])->name('classrooms.update');
Route::delete('classrooms/{classroom}', [ClassroomController::class, 'destroy'])->name('classrooms.destroy');

//lessons
Route::get('lessons', [LessonController::class, 'index'])->name('lessons.index');
Route::get('lessons/{lesson}', [LessonController::class, 'show'])->name('lessons.show');
Route::post('lessons', [LessonController::class, 'store'])->name('lessons.store');
Route::put('lessons/{lesson}', [LessonController::class, 'update'])->name('lessons.update');
Route::delete('lessons/{lesson}', [LessonController::class, 'destroy'])->name('lessons.destroy');
Route::get('/lesson/{lesson_id}', [\App\Http\Controllers\LessonController::class, 'getLessonTitle']);

//students
Route::post('/login', [\App\Http\Controllers\StudentController::class, 'login']);
Route::get('students', [StudentController::class, 'index'])->name('students.index');
Route::get('students/{student}', [StudentController::class, 'show'])->name('students.show');
Route::post('students', [StudentController::class, 'store'])->name('students.store');
Route::put('students/{student}', [StudentController::class, 'update'])->name('students.update');
Route::delete('students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');
Route::post('/submit_exam', [ExamController::class, 'kumpulUjian']);

//exams
Route::get('exams',[ExamController::class,'index'])->name('exams.index');
Route::get('exams/{exam}',[ExamController::class,'show'])->name('exams.show');
Route::post('exams',[ExamController::class,'store'])->name('exams.store');
Route::put('exams/{exam}',[ExamController::class,'update'])->name('exams.update');
Route::delete('exams/{exam}',[ExamController::class,'destroy'])->name('exams.destroy');
Route::get('/exams/{classroom_id}/{student_id}', [ExamController::class, 'index']);

//questions
Route::get('/get-questions/{exam_id}', [QuestionController::class, 'index']);
Route::get('questions/{question}',[QuestionController::class,'show'])->name('questions.show');
Route::post('questions',[QuestionController::class,'store'])->name('questions.store');
Route::put('questions/{question}',[QuestionController::class,'update'])->name('questions.update');
Route::delete('questions/{question}',[QuestionController::class,'destroy'])->name('questions.destroy');

//grades
Route::get('grades',[GradeController::class,'index'])->name('grades.index');
Route::get('grades/{grade}',[GradeController::class,'show'])->name('grades.show');
Route::post('grades',[GradeController::class,'store'])->name('grades.store');
Route::put('grades/{grade}',[GradeController::class,'update'])->name('grades.update');
Route::delete('grades/{grade}',[GradeController::class,'destroy'])->name('grades.destroy');
Route::post('/get_identity', [GradeController::class, 'index']);