<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\PostController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/** ---------Register and Login ----------- */
Route::controller(AuthController::class)->group(function()
{
    Route::post('register', 'register');
    Route::post('login', 'login');
});

/** -----------Users --------------------- */
Route::middleware('auth:sanctum')->group(function() {
    Route::get('/posts',[PostController::class,'index'])->name('index');
    Route::post('/post/store',[PostController::class,'store'])->name('store');
    Route::post('/post/{id}/update',[PostController::class,'update'])->name('update');
    Route::get('/post/{id}/show',[PostController::class,'show'])->name('show');
    Route::delete('/post/{id}/delete',[PostController::class,'destroy'])->name('destroy');
});

