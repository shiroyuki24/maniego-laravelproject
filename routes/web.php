<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});



Route::middleware('auth', 'verified')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route::get('/posts', [PostController::class, 'index'])->name('post.index');
    // Route::get('/posts/create', [PostController::class, 'create'])->name('post.create');
    // Route::post('/posts/create', [PostController::class, 'store'])->name('post.store');
    // Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
    // Route::put('/posts/{post}', [PostController::class, 'update'])->name('post.update');
    // Route::get('/posts/{post}', [PostController::class, 'show'])->name('post.show');
    // Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('post.destroy');

    Route::resource('post', PostController::class);
  
    Route::middleware('auth', 'verified')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    });

    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.update-password');

});

require __DIR__.'/auth.php';
