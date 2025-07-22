<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('post.show');
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');
