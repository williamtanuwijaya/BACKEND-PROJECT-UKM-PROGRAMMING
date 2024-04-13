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
Route::delete('students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');

//exams
Route::get('exams',[ExamController::class,'index'])->name('exams.index');
Route::get('exams/{exam}',[ExamController::class,'show'])->name('exams.show');
Route::post('exams',[ExamController::class,'store'])->name('exams.store');
Route::put('exams/{exam}',[ExamController::class,'update'])->name('exams.update');
Route::delete('exams/{exam}',[ExamController::class,'destroy'])->name('exams.destroy');

//examSessions
Route::get('exam-sessions',[ExamSessionController::class,'index'])->name('exam-sessions.index');
Route::get('exam-sessions/{examSession}',[ExamSessionController::class,'show'])->name('exam-sessions.show');
Route::post('exam-sessions',[ExamSessionController::class,'store'])->name('exam-sessions.store');
Route::put('exam-sessions/{examSession}',[ExamSessionController::class,'update'])->name('exam-sessions.update');
Route::delete('exam-sessions/{examSession}',[ExamSessionController::class,'destroy'])->name('exam-sessions.destroy');

//questions
Route::get('questions',[QuestionController::class,'index'])->name('questions.index');
Route::get('questions/{question}',[QuestionController::class,'show'])->name('questions.show');
Route::post('questions',[QuestionController::class,'store'])->name('questions.store');
Route::put('questions/{question}',[QuestionController::class,'update'])->name('questions.update');
Route::delete('questions/{question}',[QuestionController::class,'destroy'])->name('questions.destroy');

//examGroups
Route::get('exam-groups',[ExamGroupController::class,'index'])->name('exam-groups.index');
Route::get('exam-groups/{examGroup}',[ExamGroupController::class,'show'])->name('exam-groups.show');
Route::post('exam-groups',[ExamGroupController::class,'store'])->name('exam-groups.store');
Route::put('exam-groups/{examGroup}',[ExamGroupController::class,'update'])->name('exam-groups.update');
Route::delete('exam-groups/{examGroup}',[ExamGroupController::class,'destroy'])->name('exam-groups.destroy');


//grades
Route::get('grades',[GradeController::class,'index'])->name('grades.index');
Route::get('grades/{grade}',[GradeController::class,'show'])->name('grades.show');
Route::post('grades',[GradeController::class,'store'])->name('grades.store');
Route::put('grades/{grade}',[GradeController::class,'update'])->name('grades.update');
Route::delete('grades/{grade}',[GradeController::class,'destroy'])->name('grades.destroy');

//answers
Route::get('answers',[AnswerController::class,'index'])->name('answers.index');
Route::get('answers/{answer}',[AnswerController::class,'show'])->name('answers.show');
Route::post('answers',[AnswerController::class,'store'])->name('answers.store');
Route::put('answers/{answer}',[AnswerController::class,'update'])->name('answers.update');
Route::delete('answers/{answer}',[AnswerController::class,'destroy'])->name('answers.destroy');