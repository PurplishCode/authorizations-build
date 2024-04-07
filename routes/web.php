<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::middleware(['auth'])->group(function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


    Route::get('/create/post', [PostController::class, 'create'])->name('create.post');
});

 Route::post('login', [SessionController::class, 'login'])->name('post.login');

 Route::post('submit.post', [PostController::class, 'store'])->name('submit.post');

 Route::get('/posts/{post_id}', [PostController::class, 'show'])->name('update.post');

 Route::post('edit.post', [PostController::class, 'edit'])->name('edit.post');
