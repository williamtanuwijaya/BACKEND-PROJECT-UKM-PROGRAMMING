<?php

use App\Http\Controllers\ClassroomController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('classrooms', [ClassroomController::class, 'index'])->name('classrooms.index');
Route::get('classrooms/{classroom}', [ClassroomController::class, 'show'])->name('classrooms.show');
Route::post('classrooms', [ClassroomController::class, 'store'])->name('classrooms.store');
Route::put('classrooms/{classroom}', [ClassroomController::class, 'update'])->name('classrooms.update');
Route::delete('classrooms/{classroom}', [ClassroomController::class, 'destroy'])->name('classrooms.destroy');