<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Doctors\DoctorsController;
use App\Http\Controllers\Exams\ExamsController;
use App\Http\Controllers\Students\StrudentsController;
use App\Http\Controllers\Students\StudentPageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/doctors/register', [DoctorsController::class, 'store']);
Route::post('/doctors/login', [DoctorsController::class, 'authenticate']);
Route::get('/doctors/logout', [DoctorsController::class, 'logout']);

Route::middleware('auth:sanctum')->group(function () {
  Route::post('/doctors/index', [StrudentsController::class, 'import']);
  Route::get('/doctors/show/{id}', [StrudentsController::class, 'show']);
  Route::get('/export/{id}', [StrudentsController::class, 'export'])->name('export');
  Route::get('/doctors/showExam/{subjectId}', [ExamsController::class, 'showExam']);
  Route::put('/doctors/updateStudent/{studentId}', [ExamsController::class, 'updateStudentDoneExam']);
});

Route::get('/students/index', [StudentPageController::class, 'index']);
Route::get('/students/showExam/{subjectId}', [StudentPageController::class, 'showExam']);