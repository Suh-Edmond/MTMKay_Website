<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\BlogCommentsController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\UserController;
use App\Models\Enrollment;
use Illuminate\Support\Facades\Route;



Route::middleware(['auth', 'verified'])->prefix('dashboard')->group(function (){
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('manage-programs', [ProgramController::class, 'index'])->name('manage-programs');
    Route::get('manage-trainees', [EnrollmentController::class, 'index'])->name('manage-students');
    Route::get('manage-blogs', [BlogController::class, 'manageBlogs'])->name('manage-blogs');
    Route::delete('manage-trainees/delete', [EnrollmentController::class, 'deleteTrainee'])->name('trainee.destroy');
    Route::post('manage-trainees/payment-fees', [EnrollmentController::class, 'makePayment'])->name('trainee.make_payment');
    Route::get('manage-programs/details', [ProgramController::class, 'show'])->name('show.program');
    Route::put('manage-programs/details/update-image', [ProgramController::class, 'updateImage'])->name('program.update.image');
    Route::put('manage-programs/details/update-information', [ProgramController::class, 'updateProgramInformation'])->name('program.update.information');
    Route::put('manage-programs/details/update-outline', [ProgramController::class, 'updateOutline'])->name('program.update.outline');
    Route::get('manage-blogs/details', [BlogController::class, 'showBlog'])->name('show.blog');
    Route::put('manage-blogs/details/update-information',[BlogController::class, 'updateInformation'])->name('blog.update.information');
    Route::delete('manage-blogs/details/tags/delete', [BlogController::class, 'deleteTag'])->name('blog.tag.delete');
    Route::get('manage-blogs/details/comments', [BlogController::class, 'showBlogComments'])->name('show.blog.comments');
    Route::put('manage-blogs/details/comments/update-status', [BlogController::class, 'updateCommentStatus'])->name('show.blog.comments.update.status');
    Route::get('manage-trainees/payments/view', [EnrollmentController::class, 'fetchPaymentTransactions'])->name('manage-students.view.payments');
    Route::get('manage-blogs/create-blog', [BlogController::class, 'createBlog'])->name('manage.blog.create');
});

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
Route::post('/programs/{slug}/enroll', [UserController::class, 'enrollStudent'])->name('enroll-student');
Route::get('/program-enrollment/verify-email', [UserController::class, 'completeEnrollment'])->name('complete-enrollment');


require __DIR__.'/auth.php';
