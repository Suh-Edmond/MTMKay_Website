<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\BlogCommentsController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about-us', [AboutUsController::class, 'index'])->name('about');
Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::get('/training', [TrainingController::class, 'index'])->name('training');
Route::get('/training-detail', [TrainingController::class, 'show'])->name('show-training');
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/contact-us', [ContactController::class, 'index'])->name('contact');
Route::post('/submit-inquiry', [ContactController::class, 'submitRequest'])->name('on-inquire');
Route::get('/blog-detail', [BlogController::class, 'show'])->name('show-blog');
Route::post('/blog/create', [BlogCommentsController::class, 'createComment'])->name('create-comment');
Route::post('/programs/{id}/enroll', [UserController::class, 'enrollStudent'])->name('enroll-student');
Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, '__invoke'])->middleware(['signed', 'throttle:6,1'])->name('verification.verify');
require __DIR__.'/auth.php';
