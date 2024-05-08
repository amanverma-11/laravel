<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\PostController;




/*
--Creating my first route - Method 1-- 
Route::get('/post', function(){
    return view('post');
});

--Creating my first route (Directly returning route)- Method 2--
Route::view('/post', 'post'); (route, view)

--Laravel provides a feature that allows the actual view name to be different from the name mentioned in the URL--
Route::get('/hello', function(){
    return view('post');
});

--Subroutes--
Route::get('/post/firstpost', function(){
    return view('firstpost');
});

--Routing Parameters, passing values to the URL--
Route::get('/post/{id?}/comment/{commentid?}', function($id = null, $commentid = null){
    if($id)
    return "<h1>Post ID : ".$id."& Comment ID : ".$commentid."</h1>";

return "<h1>No ID Found</h1>";
});

--Routing Parameters Constraints--
Route::get('/post/{id}/comment/{commentid}', function(string $id, string $commentid){
    return "<h1>Post ID : ".$id." & Comment ID : ".$commentid."</h1>";
})->where('id', '[a-zA-Z0-9]+')->whereAlpha('commentid');

--Named Routes--
Suppose for some reason I changed the name of routes in URL then I have to change it in all the anchor tags as well which is a tedious task.
Providing name to the routes helps us in searching the routes without having to look at the exact name specified in the URL
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/postss', function(){
    return view('post');
})->name('post');

Route::get('/about', function(){
    return view('about');
})->name('about');

--Grouping of Routes

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::prefix('page')->group(function(){
    Route::get('/about', function(){
        return view('about');
    })->name('about');
    
    Route::get('/post', function(){
        return view('post');
    })->name('post');
});
*/

// Register routes
Route::get('/', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/', [RegisterController::class, 'register']);

// Login routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Create post routes
Route::get('/post', [PostController::class, 'showCreatePostForm'])->name('post');
Route::post('/post', [PostController::class, 'store']);

// Show all posts
Route::get('/posts', [PostController::class, 'showPosts'])->name('posts');

// Show a single post
Route::get('/post/{id}', [PostController::class, 'showPost'])->name('showPost');

//Edit a post
Route::get('/post/{post}/edit', [PostController::class, 'showEditPostForm'])->name('edit');

//Update a post
Route::put('/post/{post}/update', [PostController::class, 'update'])->name('update');

//Delete a post
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('delete');

Route::get('/about', function(){
    return view('about');
})->name('about');

Route::get('/report', [ReportController::class, 'show'])->middleware('construction')->name('report');



