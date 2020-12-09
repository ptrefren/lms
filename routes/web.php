<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentEnrollmentController;
use App\Http\Controllers\CourseEnrollmentController;
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


Route::resource('courses', CourseController::class);
Route::resource('students', StudentController::class);
Route::resource('studentsenrollment', StudentEnrollmentController::class);
Route::resource('coursesenrollment', CourseEnrollmentController::class);


Route::get('/', function () {
    return view('welcome');
});
