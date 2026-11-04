<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\CourseRegistrationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\RegistrationController;

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/contact', [ContactController::class, 'contact'])->name('contact');
Route::get('/contactlist', [ContactController::class, 'contactlist'])->name('contactlist');
Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout'); 
Route::get('/register', [PageController::class, 'register'])->name('register');
Route::get('/forgot-password', [PageController::class, 'forgotPassword'])->name('password.request');
Route::middleware('auth')->group(function () {
    Route::get('/students/{student}/courses', [CourseRegistrationController::class, 'studentCourses'])
        ->middleware('permission:view own registrations|manage students')
        ->name('students.courses');

    Route::get('/courses/{course}/students', [CourseRegistrationController::class, 'courseStudents'])
        ->middleware('permission:view course students|manage courses')
        ->name('courses.students');

    Route::resource('students', StudentController::class)
        ->except('show')
        ->middleware('permission:manage students');

    Route::get('/courses', [CourseController::class, 'index'])
        ->middleware('permission:manage courses|view available courses')
        ->name('courses.index');

    Route::resource('courses', CourseController::class)
        ->except(['index', 'show'])
        ->middleware('permission:manage courses');

    Route::post('/courses/{course}/register', [RegistrationController::class, 'store'])
        ->middleware('permission:register for course|manage registrations')
        ->name('courses.register');

    Route::get('/my-registrations', [RegistrationController::class, 'mine'])
        ->middleware('permission:view own registrations')
        ->name('registrations.mine');
});
