<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Attendance\AttendanceController;
use App\Http\Controllers\Courses\CoursesController;
use App\Http\Controllers\Homework\HomeworkController;
use App\Http\Controllers\Notes\NotesController;
use App\Http\Controllers\Reports\ReportController;
use App\Http\Controllers\Semester\SemesterController;
use App\Http\Controllers\Settings\SettingController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Teacher\TeacherController;
use App\Http\Controllers\Users\UserController;
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


Route::get('/', [AdminController::class, 'dashboard'])->name('admin');
Route::get('/roles', [AdminController::class, 'roles'])->name('admin.roles');
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/teachers', [TeacherController::class, 'index'])->name('teachers.index');
Route::get('/courses', [CoursesController::class, 'index'])->name('courses.index');
Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
Route::get('/semesters', [SemesterController::class, 'index'])->name('semesters.index');
Route::get('/students', [StudentController::class, 'index'])->name('student.index');
Route::get('/students/attendance', [StudentController::class, 'attendance'])->name('student.attendance.index');
Route::get('/students/notes', [StudentController::class, 'notes'])->name('student.notes.index');
Route::get('/students/homeworks', [StudentController::class, 'homeworks'])->name('student.homework.index');
Route::get('/attendance', [AttendanceController::class, 'index'])->name('attendance.index');
Route::get('/notes', [NotesController::class, 'index'])->name('notes.index');
Route::get('/homework', [HomeworkController::class, 'index'])->name('homework.index');
Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
Route::get('/settings/system', [SettingController::class, 'system'])->name('system.index');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/', function () {
        return view('admin.index');
    });
    Route::get('/admin', function () {
        return view('admin.index');
    })->name('admin');

});
