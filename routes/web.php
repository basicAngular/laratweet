<?php

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'TimelineController@index');
    Route::post('/posts', 'PostController@create');
    Route::get('/posts', 'PostController@index');

    Route::get('/user/{user}', 'UserController@index')->name('users');
    Route::get('/user/{user}/follow', 'UserController@follow')->name('users.follow');
    Route::get('/user/{user}/unfollow', 'UserController@unfollow')->name('users.unfollow');
});

