<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\registeredController;
use Illuminate\Support\Facades\Route;



// register and login
Route::get('/login',            [registeredController::class, 'login_index'])->name('auth.login.index')->middleware('guest');
Route::post('/login',        [registeredController::class, 'login_store'])->name('login')->middleware('guest');
Route::get('/register',            [registeredController::class, 'register_index'])->name('auth.register.index')->middleware('guest');
Route::post('/register',        [registeredController::class, 'register_store'])->name('auth.register.store')->middleware('guest');

Route::post('/logout',        [registeredController::class, 'logout'])->name('auth.logout')->middleware('auth');

//post
Route::post('/post',        [PostController::class, 'store'])->name('post.store')->middleware('auth');
Route::get('/home',         [PostController::class, 'index'])->name('home')->middleware('auth');

//comment
Route::post('/comment',        [CommentController::class, 'store'])->name('comment.store')->middleware('auth');

Route::get('/', function () {
    return view('about');
});

Route::get('/team', function () {
    return view('team');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/test', function () {
    return view('test');
});
