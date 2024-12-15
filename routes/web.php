<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\TutorApplicationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageSectionController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\BrowseController;

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
    Route::patch('/dashboard/profile', [ProfileController::class, 'update'])->name('dashboard.update');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/dashboard/requests', [UserDashboardController::class, 'requests'])->name('dashboard.requests');
    
    Route::get('/browse', [BrowseController::class, 'index'])->name('browse.index');
});

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/manage-users', [AdminController::class, 'manageUsers'])->name('admin.manageUsers');
    Route::get('/analytics', [AdminController::class, 'analytics'])->name('admin.analytics');
    Route::get('/settings', [AdminController::class, 'settings'])->name('admin.settings');
});
Route::get('/tutorApplication', function () {
    return view('tutorApplication');
})->middleware(['auth', 'verified'])->name('tutorApplication');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::post('/tutorApplication', [TutorApplicationController::class, 'submitStep'])->name('tutorApplication.submitStep');

Route::get('/applications/{id}/view', [ApplicationController::class, 'view'])->name('applications.view');
Route::post('/applications/{id}/confirm', [ApplicationController::class, 'confirm'])->name('applications.confirm');
Route::post('/applications/popup/close', [ApplicationController::class, 'closePopup'])->name('applications.popup.close');

require __DIR__.'/auth.php';