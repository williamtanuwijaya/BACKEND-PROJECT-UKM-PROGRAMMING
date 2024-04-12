<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\LessonController;


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

