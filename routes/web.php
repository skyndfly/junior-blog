<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', IndexController::class)->name('index');

Route::get('/category', function () {return view('category');})->name('category');

Route::get('/dashboard', function () { return view('dashboard');})->middleware(['auth', 'verified'])->name('dashboard');

//article
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('article.show');

//comments
Route::post('/comments/add-comment-guest', [CommentsController::class, 'storeGuest'])->name('comments.store.guest');
Route::post('/comments/add-comment-auth', [CommentsController::class, 'storeAuth'])->name('comments.store.auth');
Route::get('/comments/get-all-paginate', [CommentsController::class, 'getAllPaginate'])->name('comments.get.all.paginate');

Route::middleware('auth:web')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
