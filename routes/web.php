<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\TutorApplicationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageSectionController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\BrowseController;
use App\Http\Controllers\BookingController;

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
    Route::get('/dashboard/bookings', [UserDashboardController::class, 'bookings'])->name('dashboard.bookings');
    Route::get('/browse', [BrowseController::class, 'index'])->name('browse.index');

    Route::patch('/admin/manage-users/{id}', [AdminController::class, 'updateUser'])->name('admin.updateUser');

    Route::patch('/applications/{id}/approve', [ApplicationController::class, 'approve'])->name('applications.approve');
    Route::patch('/applications/{id}/reject', [ApplicationController::class, 'reject'])->name('applications.reject');
});

Route::post('/book-tutor', [BrowseController::class, 'book'])->name('book.tutor');
Route::post('/booking/send', [BookingController::class, 'store'])->name('booking.store');
Route::patch('/booking/{id}/reject', [BookingController::class, 'reject'])->name('booking.reject');
Route::patch('/booking/{id}/approve', [BookingController::class, 'approve'])->name('booking.approve');
Route::patch('/booking/{id}/cancel', [BookingController::class, 'cancel'])->name(name: 'booking.cancel');
Route::patch('/booking/{id}/delete', [BookingController::class, 'delete'])->name(name: 'booking.delete');

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/manage-tutor-applications', [AdminController::class, 'manageTutorApplications'])->name('admin.manageTutorApplications');
    Route::get('/manage-users', [AdminController::class, 'manageUsers'])->name('admin.manageUsers');
    Route::get('/rejected-applications', [ApplicationController::class, 'manageRejectedApplications'])->name('admin.manageRejectedApplications');
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

Route::get('/users/{id}/manageView', [UserController::class, 'manageView'])->name('users.manageView');
Route::post('/users/{id}/delete', [UserController::class, 'delete'])->name('users.delete');
Route::post('/users/{id}/update', [UserController::class, 'update'])->name('users.update');
Route::post('/users/popup/close', [UserController::class, 'closePopup'])->name('users.popup.close');


require __DIR__.'/auth.php';
