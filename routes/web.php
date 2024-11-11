

<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TrainingController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about-us', [AboutUsController::class, 'index'])->name('about');
Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::get('/training', [TrainingController::class, 'index'])->name('training');
Route::get('/training-detail', [TrainingController::class, 'show'])->name('show-training');
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/contact-us', [ContactController::class, 'index'])->name('contact');
Route::post('/submit-contact', [ContactController::class, 'submitRequest'])->name('on-submit-contact');
Route::get('blog-detail', [BlogController::class, 'show'])->name('show-blog');
