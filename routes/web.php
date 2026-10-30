<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\CourseRegistrationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/contact', [ContactController::class, 'contact'])->name('contact');
Route::get('/contactlist', [ContactController::class, 'contactlist'])->name('contactlist');
Route::get('/login', [PageController::class, 'login'])->name('login');
Route::get('/register', [PageController::class, 'register'])->name('register');
Route::get('/forgot-password', [PageController::class, 'forgotPassword'])->name('password.request');
Route::get('/students/{student}/courses', [CourseRegistrationController::class, 'studentCourses'])
    ->name('students.courses');
Route::get('/courses/{course}/students', [CourseRegistrationController::class, 'courseStudents'])
    ->name('courses.students');
