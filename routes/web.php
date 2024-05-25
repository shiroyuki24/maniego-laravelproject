<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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

});

require __DIR__.'/auth.php';
