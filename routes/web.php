<?php

use App\Http\Controllers\MainController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;

use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index'])->name('main');

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');


//Categories
Route::get('/admin/categories', [CategoryController::class, 'index'])->middleware(['auth', 'verified'])->name('admin.categories.index');

Route::get('/admin/categories/create', [CategoryController::class, 'create'])->middleware(['auth', 'verified'])->name('admin.categories.create');

Route::post('/admin/categories', [CategoryController::class, 'store'])->middleware(['auth', 'verified'])->name('admin.categories.store');

Route::get('/admin/categories/{category}/edit', [CategoryController::class, 'edit'])->middleware(['auth', 'verified'])->name('admin.categories.edit');

Route::patch('/admin/categories/{category}', [CategoryController::class, 'update'])->middleware(['auth', 'verified'])->name('admin.categories.update');

Route::delete('/admin/categories/{category}', [CategoryController::class, 'destroy'])->middleware(['auth', 'verified'])->name('admin.categories.delete');

//Posts
Route::get('/admin/posts', [PostController::class, 'index'])->middleware(['auth', 'verified'])->name('admin.post.index');

Route::get('/admin/posts/create', [PostController::class, 'create'])->middleware(['auth', 'verified'])->name('admin.post.create');

Route::get('/admin/posts/{post}', [PostController::class, 'show'])->middleware(['auth', 'verified'])->name('admin.post.show');

Route::post('/admin/posts', [PostController::class, 'store'])->middleware(['auth', 'verified'])->name('admin.post.store');

Route::get('/admin/posts/{post}/edit', [PostController::class, 'edit'])->middleware(['auth', 'verified'])->name('admin.post.edit');

Route::patch('/admin/posts/{post}', [PostController::class, 'update'])->middleware(['auth', 'verified'])->name('admin.post.update');

Route::delete('/admin/posts/{post}', [PostController::class, 'destroy'])->middleware(['auth', 'verified'])->name('admin.post.delete');


// Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
