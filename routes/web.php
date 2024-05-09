<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\PostController;


//Home Page
Route::get('/', function(){ return view('home');});

// Register routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Login routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::group(['middleware' => 'auth'], function () {
    // Your protected routes here

    // Create post form routes
    Route::get('/post', [PostController::class, 'showCreatePostForm'])->name('post.create');
    // Show all posts
    Route::get('/posts', [PostController::class, 'showPosts'])->name('posts.show');
    // Show a single post
    Route::get('/post/{id}', [PostController::class, 'showPost'])->name('post.show');
    //Edit a post
    Route::get('/post/{post}/edit', [PostController::class, 'showEditPostForm'])->name('post.edit');
    //Update a post
    Route::put('/post/{post}/update', [PostController::class, 'update'])->name('post.update');
    //Delete a post
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('post.delete');
    //Logout a user
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::post('/post', [PostController::class, 'store']);

Route::get('/about', function(){
    return view('about');
})->name('about');




