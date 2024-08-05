<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CkeditorImageUplod;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

Route::prefix('lk')->middleware('guest:admin')->group(function () {
    Route::get('login', [LoginController::class, 'create'])->name('admin.login');
    Route::post('login', [LoginController::class, 'store']);

});

Route::prefix('lk')->middleware('auth:admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::post('logout', [LoginController::class, 'destroy'])->name('admin.logout');

    //category
    Route::get('/create-category', [CategoryController::class, 'create'])->name('admin.category.create');
    Route::post('/create-category', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('/categories', [CategoryController::class, 'index'])->name('admin.category.index');

    //article
    Route::get('/create-article', [ArticleController::class, 'create'])->name('admin.article.create');
    Route::post('/create-article', [ArticleController::class, 'store'])->name('admin.article.store');

    //ckeditor upload image
    Route::post('/upload-image', CkeditorImageUplod::class)->name('admin.ckeditor.image.upload');
});
