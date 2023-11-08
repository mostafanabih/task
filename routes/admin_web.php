<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\PostController;


Route::group(['prefix' => 'admin'],function(){
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('post-login', [AuthController::class,'login'])->name('admin.login.post');
    Route::get('logout', [AuthController::class,'logout'])->name('admin.logout');


    Route::group(['middleware'=>['check-auth-admin']],function(){
        Route::get('home', [PostController::class, 'home'])->name('admin.index');
        Route::resource('posts', PostController::class);
        


       

    });
});




