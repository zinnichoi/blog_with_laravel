<?php
Route::get('/login', 'Auth\LoginController@getLogin')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::get('/register', 'Auth\RegisterController@getRegister')->name('register');
Route::post('/register', 'Auth\RegisterController@doRegister');

Route::middleware('auth')->group(function () {
    Route::get('/', 'BlogController@index');
    Route::get('/home', 'BlogController@index')->name('home');
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
    Route::prefix('blog')->group(function () {
        Route::get('/create', 'BlogController@create')->name('view.create.blog');
        Route::post('/create', 'BlogController@store')->name('create.blog');
        Route::get('/show/{blog}', 'BlogController@show')->name('show.blog');
        Route::get('/edit/{blog}', 'BlogController@edit')->name('view.edit.blog');
        Route::put('/update/{blog}', 'BlogController@update')->name('update.blog');
        Route::get('/delete/{blog}', 'BlogController@delete')->name('delete.blog');
        Route::get('/filterByAgeLimit/{age}', 'BlogController@filterByAgeLimit')->name('filterByAgeLimit.blog');
        Route::get('/filterByGenderLimit/{gender}', 'BlogController@filterByGenderLimit')
            ->name('filterByGenderLimit.blog');
        Route::get('/search', 'BlogController@search')->name('search.blog');
    });
});
