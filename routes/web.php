<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentCourseController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('students',StudentController::class);
Route::resource('courses',CourseController::class);
Route::resource('student-courses',StudentCourseController::class);
