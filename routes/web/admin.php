<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Route User
Route::resource('users', UserController::class)->except('show');

// Route Category
Route::resource('categories', CategoryController::class);
Route::post('categories/upload_ckeditor', [CategoryController::class, 'upload_ckeditor'])->name('categories.upload_ckeditor');
Route::get('categories/file_browser', [CategoryController::class, 'file_browser']);

// Route Post
Route::resource('posts', PostController::class);
Route::post('posts/upload_ckeditor', [PostController::class, 'upload_ckeditor'])->name('posts.upload_ckeditor');
Route::get('posts/file_browser', [PostController::class, 'file_browser']);
