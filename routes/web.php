<?php

use App\Http\Controllers\BlogPostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', [BlogPostController::class, 'index'])->name('dashboard');

Route::resource('blog-posts', BlogPostController::class);
Route::put('blog-posts-change-status/{id}', [BlogPostController::class, 'updateStatus']);
