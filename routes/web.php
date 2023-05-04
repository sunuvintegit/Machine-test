<?php

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
Route::get('/addStudent', [App\Http\Controllers\StudentController::class, 'createStudentForm'])->name('addStudentForm');
Route::post('/addStudent', [App\Http\Controllers\StudentController::class, 'createStudent'])->name('addStudent');
Route::get('/editStudent/{id}', [App\Http\Controllers\StudentController::class, 'editStudent'])->name('students.edit');
Route::post('/updateStudent/{id}', [App\Http\Controllers\StudentController::class, 'updateStudent'])->name('students.update');
Route::get('/deleteStudent/{id}', [App\Http\Controllers\StudentController::class, 'deleteStudent'])->name('students.delete');

Route::post('/student_mark', [App\Http\Controllers\StudentController::class, 'addStudentMark'])->name('students.addMark');

Route::get('/getStateByCountry', [App\Http\Controllers\StudentController::class, 'getStateByCountry'])->name('getStateByCountry');

