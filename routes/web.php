<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\TutorApplicationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageSectionController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\UserDashboardController;

// Route::get('/', [HomeController::class, 'welcome'])->name('welcome');

// Route::middleware(['auth'])->group(function () {
//     return view('dashboard');
// });

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tutorApplication/{pageNumber?}', [PageSectionController::class, 'showPage'])->name('pageSection.show');

Route::middleware(['auth'])->group(function () {
    Route::get('/complete-profile', [RegisteredUserController::class, 'showProfileCompletion'])->name('complete-profile.show');
    Route::post('/complete-profile', [RegisteredUserController::class, 'completeProfile'])->name('complete-profile.store');
    
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/profile', [UserDashboardController::class, 'profile'])->name('dashboard.userProfile');
    Route::get('/dashboard/requests', [UserDashboardController::class, 'requests'])->name('dashboard.requests');
});


Route::middleware(['auth'])->get('/browse', function () {
    return view('browse');
})->name('browse');

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

Route::get('/tutorApplication', function () {
    return view('tutorApplication');
})->middleware(['auth', 'verified'])->name('tutorApplication');

Route::middleware('auth')->group(function () {
    // Route::get('/profile', )
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/tutorApplication', [TutorApplicationController::class, 'submitStep'])->name('tutorApplication.submitStep');

//Admin Stuff
Route::delete('/applications/{id}/deny', [ApplicationController::class, 'deny'])->name('applications.deny');
Route::delete('/applications/{application}', [ApplicationController::class, 'destroy'])->name('applications.destroy');


require __DIR__.'/auth.php';