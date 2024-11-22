<?php

use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;

Route::get('/', function () {
    return view('home');
});

Route::get('/posts', [PostController::class, 'index'])
    ->name('posts');

Route::get('/posts/{post:slug}', [PostController::class, 'show'])
    ->name('post');

Route::get('/authors/{user}', [PostController::class, 'index'])
    ->name('author');

Route::get('/promoted', [PostController::class, 'promoted'])
    ->name("promoted");

Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']) 
    ->name("comment");

Route::delete('/comments/{comment}', [PostCommentsController::class, 'destroy'])
    ->name('comments.destroy');


