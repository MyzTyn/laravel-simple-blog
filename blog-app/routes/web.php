<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Category routes
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

// Post routes
Route::get('/posts', [ArticleController::class, 'index'])->name('posts.index');
Route::post('/posts', [ArticleController::class, 'store'])->name('posts.store');
Route::get('/posts/create', [ArticleController::class, 'create'])->name('posts.create');
Route::get('/posts/{post}', [ArticleController::class, 'show'])->name('posts.show');
Route::get('/posts/{post}/edit', [ArticleController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{post}', [ArticleController::class, 'update'])->name('posts.update');
Route::delete('/posts/{post}', [ArticleController::class, 'destroy'])->name('posts.destroy');

Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');
