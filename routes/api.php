<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Api\V1\Controllers\AuthController;
use App\Api\V1\Controllers\BlogPostController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('v1')->namespace('App\Api\V1\Controllers')->group(function () {
    
    Route::post('/login', [AuthController::class, 'login']);
 
    Route::middleware('auth:api')->group(function () {
        Route::get('/blog-posts', [BlogPostController::class, 'getBlockPosts']);
        Route::get('/blog-post/{id}', [BlogPostController::class, 'getBlockPostsById']);
    });


});
