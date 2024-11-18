<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ApplicationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageSectionController;

// Route::get('/', [HomeController::class, 'welcome'])->name('welcome');

// Route::middleware(['auth'])->group(function () {
//     return view('dashboard');
// });

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tutor/{pageNumber?}', [PageSectionController::class, 'showPage'])->name('pageSection.show');

Route::middleware(['auth'])->group(function () {
    Route::get('/complete-profile', [RegisteredUserController::class, 'showProfileCompletion'])->name('complete-profile.show');
    Route::post('/complete-profile', [RegisteredUserController::class, 'completeProfile'])->name('complete-profile.store');
});

Route::middleware(['auth'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/admin', function () {
    return view('admin');
})->middleware(['auth', 'verified'])->name('admin');

Route::get('/tutor', function () {
    return view('tutor');
})->middleware(['auth', 'verified'])->name('tutor');

Route::middleware('auth')->group(function () {
    // Route::get('/profile', )
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//these are weird
Route::post('/save-subject', [ApplicationController::class, 'saveSubject'])->name('application.save.subject');
Route::post('/tutor/resume/upload', [ApplicationController::class, 'uploadResume'])->name('applcation.resume.upload');
Route::post('/tutor/hourly-rate', [ApplicationController::class, 'setHourlyRate'])->name('applcation.set.hourly.rate');
Route::post('/tutor', [ApplicationController::class, 'store'])->name('applications.store');

require __DIR__.'/auth.php';
