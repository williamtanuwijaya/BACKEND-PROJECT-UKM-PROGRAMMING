<?php

use App\Http\Controllers\AnswerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ExamGroupController;
use App\Http\Controllers\ExamSessionController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\QuestionController;
use App\Models\ExamSession;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

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

//students
Route::get('students', [StudentController::class, 'index'])->name('students.index');
Route::get('students/{student}', [StudentController::class, 'show'])->name('students.show');
Route::post('students', [StudentController::class, 'store'])->name('students.store');
Route::put('students/{student}', [StudentController::class, 'update'])->name('students.update');
Route::delete('students/{Student}', [StudentController::class, 'destroy'])->name('students.destroy');

//exams
Route::get('exams',[ExamController::class,'index'])->name('exams.index');
Route::get('exams/{exams}',[ExamController::class,'show'])->name('exams.show');
Route::post('exams',[ExamController::class,'store'])->name('exams.store');
Route::put('exams/{exams}',[ExamController::class,'update'])->name('exams.update');
Route::delete('exams/{exams}',[ExamController::class,'destroy'])->name('exams.destroy');

//examSessions
Route::get('examSessions',[ExamSessionController::class,'index'])->name('examSessions.index');
Route::get('examSessions/{examSessions}',[ExamSessionController::class,'show'])->name('examSessions.show');
Route::post('examSessions',[ExamSessionController::class,'store'])->name('examSessions.store');
Route::put('examSessions/{examSessions}',[ExamSessionController::class,'update'])->name('examSessions.update');
Route::delete('examSessions/{examSessions}',[ExamSessionController::class,'destroy'])->name('examSessions.destroy');

//questions
Route::get('questions',[QuestionController::class,'index'])->name('questions.index');
Route::get('questions/{questions}',[QuestionController::class,'show'])->name('questions.show');
Route::post('questions',[QuestionController::class,'store'])->name('questions.store');
Route::put('questions/{questions}',[QuestionController::class,'update'])->name('questions.update');
Route::delete('questions/{questions}',[QuestionController::class,'destroy'])->name('questions.destroy');

//examGroups
Route::get('examGroups',[ExamGroupController::class,'index'])->name('examGroups.index');
Route::get('examGroups/{examGroups}',[ExamGroupController::class,'show'])->name('examGroups.show');
Route::post('examGroups',[ExamGroupController::class,'store'])->name('examGroups.store');
Route::put('examGroups/{examGroups}',[ExamGroupController::class,'update'])->name('examGroups.update');
Route::delete('examGroups/{examGroups}',[ExamGroupController::class,'destroy'])->name('examGroups.destroy');


//grades
Route::get('grades',[GradeController::class,'index'])->name('grades.index');
Route::get('grades/{grades}',[GradeController::class,'show'])->name('grades.show');
Route::post('grades',[GradeController::class,'store'])->name('grades.store');
Route::put('grades/{grades}',[GradeController::class,'update'])->name('grades.update');
Route::delete('grades/{grades}',[GradeController::class,'destroy'])->name('grades.destroy');

//answers
Route::get('answers',[AnswerController::class,'index'])->name('answers.index');
Route::get('answers/{answers}',[AnswerController::class,'show'])->name('answers.show');
Route::post('answers',[AnswerController::class,'store'])->name('answers.store');
Route::put('answers/{answers}',[AnswerController::class,'update'])->name('answers.update');
Route::delete('answers/{answers}',[AnswerController::class,'destroy'])->name('answers.destroy');