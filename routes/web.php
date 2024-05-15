<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\Auth\GoogleAuthController;


//Home Page Route
Route::get('/', function(){ return view('home');})->name('home');


// Register post request route
Route::post('/register', [RegisterController::class, 'register']);

// Login post request route
Route::post('/login', [LoginController::class, 'login']);

//Restricting already logged in user from accessing register and login routes
Route::group(['middleware' => 'guest'], function(){
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

});

// Restricting unauthenticated users from accessing URLs
Route::group(['middleware' => 'auth'], function () {

    // Create post form routes
    Route::get('/post', [PostController::class, 'showCreatePostForm'])->name('post.create');
    //Post create route
    Route::post('/post', [PostController::class, 'store']);
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
    //Add a comment to the post
    Route::post('/posts/{id}/comments', [PostController::class, 'addComment'])->name('post.addComment');
    // Add a like to the post
    Route::post('/posts/{id}/like', [LikeController::class, 'toggleLike'])->name('post.like');
    //Logout a user
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

//Google Auth
Route::get('/auth/google', [GoogleAuthController::class, 'redirect'])->name('auth.google');
Route::get('/auth/google/call-back', [GoogleAuthController::class, 'callbackGoogle'])->name('auth.google.call-back');

Route::group(['middleware' => 'guest'], function(){
    //Password reset routes
    Route::get('/forgot-password', [PasswordResetController::class, 'show'])->name('password.request');
    Route::post('/forgot-password', [PasswordResetController::class, 'sendEmail'])->name('password.email');
    Route::get('/reset-password', [PasswordResetController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [PasswordResetController::class, 'resetPassword'])->name('password.update');
});






