<?php

use App\Category;
use App\Post;

Route::get('/', function () {
    $categories=Category::all();
    $posts=Post::all();
    return view('welcome')->withCategories($categories)->withPosts($posts);
});

Auth::routes();

Route::resource('profiles', 'ProfilesController');

Route::resource('posts', 'PostController');

Route::resource('categories', 'CategoryController');

Route::resource('tags', 'TagController', ['except'=>['create']]);

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function () {
    Route::resource('/users', 'UsersController', ['except' => ['show','create','store']]);
});

//comments
Route::post('comments/{post_id}', ['uses'=>'CommentController@store','as'=>'comments.store']);
Route::get('comments/{post_id}/edit', ['uses'=>'CommentController@edit','as'=>'comments.edit']);
Route::put('comments/{post_id}', ['uses'=>'CommentController@update','as'=>'comments.update']);
Route::delete('comments/{post_id}', ['uses'=>'CommentController@destroy','as'=>'comments.destroy']);