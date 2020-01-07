<?php



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('profiles', 'ProfilesController');

Route::resource('posts', 'PostController');

Route::resource('categories', 'CategoryController');

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function () {
    Route::resource('/users', 'UsersController', ['except' => ['show','create','store']]);
});
