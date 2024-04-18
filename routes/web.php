<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ClassroomAdminController;
use App\Http\Controllers\Admin\LessonAdminController;
use App\Http\Controllers\Admin\StudentAdminController;

// Route::get('/', function () {
//     return view('welcome');
// });

// returns the home page with all classrooms
Route::get('/classroom', ClassroomAdminController::class .'@index')->name('classrooms.index');
// returns the form for adding a classroom
Route::get('/classrooms/create', ClassroomAdminController::class . '@create')->name('classrooms.create');
// adds a classroom to the database
Route::post('/classrooms', ClassroomAdminController::class .'@store')->name('classrooms.store');
// returns a page that shows a full classroom
Route::get('/classrooms/{classroom}', ClassroomAdminController::class .'@show')->name('classrooms.show');
// returns the form for editing a classroom
Route::get('/classrooms/{classroom}/edit', ClassroomAdminController::class .'@edit')->name('classrooms.edit');
// updates a classroom
Route::put('/classrooms/{classroom}', ClassroomAdminController::class .'@update')->name('classrooms.update');
// deletes a classroom
Route::delete('/classrooms/{classroom}', ClassroomAdminController::class .'@destroy')->name('classrooms.destroy');

// returns the home page with all lessons
Route::get('/lesson', LessonAdminController::class .'@index')->name('lessons.index');
// returns the form for adding a lesson
Route::get('/lessons/create', LessonAdminController::class . '@create')->name('lessons.create');
// adds a lesson to the database
Route::post('/lessons', LessonAdminController::class .'@store')->name('lessons.store');
// returns a page that shows a full lesson
Route::get('/lessons/{lesson}', LessonAdminController::class .'@show')->name('lessons.show');
// returns the form for editing a lesson
Route::get('/lessons/{lesson}/edit', LessonAdminController::class .'@edit')->name('lessons.edit');
// updates a lesson
Route::put('/lessons/{lesson}', LessonAdminController::class .'@update')->name('lessons.update');
// deletes a lesson
Route::delete('/lessons/{lesson}', LessonAdminController::class .'@destroy')->name('lessons.destroy');

// returns the home page with all students
Route::get('/student', StudentAdminController::class .'@index')->name('students.index');
// returns the form for adding a student
Route::get('/students/create', StudentAdminController::class . '@create')->name('students.create');
// adds a student to the database
Route::post('/students', StudentAdminController::class .'@store')->name('students.store');
// returns a page that shows a full student
Route::get('/students/{student}', StudentAdminController::class .'@show')->name('students.show');
// returns the form for editing a student
Route::get('/students/{student}/edit', StudentAdminController::class .'@edit')->name('students.edit');
// updates a student
Route::put('/students/{student}', StudentAdminController::class .'@update')->name('students.update');
// deletes a student
Route::delete('/students/{student}', StudentAdminController::class .'@destroy')->name('students.destroy');

// returns the home page with all exams
Route::get('/exam', StudentAdminController::class .'@index')->name('exams.index');
// returns the form for adding a exam
Route::get('/exams/create', StudentAdminController::class . '@create')->name('exams.create');
// adds a exam to the database
Route::post('/exams', StudentAdminController::class .'@store')->name('exams.store');
// returns a page that shows a full exam
Route::get('/exams/{exam}', StudentAdminController::class .'@show')->name('exams.show');
// returns the form for editing a exam
Route::get('/exams/{exam}/edit', StudentAdminController::class .'@edit')->name('exams.edit');
// updates a exam
Route::put('/exams/{exam}', StudentAdminController::class .'@update')->name('exams.update');
// deletes a exam
Route::delete('/exams/{exam}', StudentAdminController::class .'@destroy')->name('exams.destroy');

// returns the home page with all questions
Route::get('/question', StudentAdminController::class .'@index')->name('questions.index');
// returns the form for adding a question
Route::get('/questions/create', StudentAdminController::class . '@create')->name('questions.create');
// adds a question to the database
Route::post('/questions', StudentAdminController::class .'@store')->name('questions.store');
// returns a page that shows a full question
Route::get('/questions/{question}', StudentAdminController::class .'@show')->name('questions.show');
// returns the form for editing a question
Route::get('/questions/{question}/edit', StudentAdminController::class .'@edit')->name('questions.edit');
// updates a question
Route::put('/questions/{question}', StudentAdminController::class .'@update')->name('questions.update');
// deletes a question
Route::delete('/questions/{question}', StudentAdminController::class .'@destroy')->name('questions.destroy');