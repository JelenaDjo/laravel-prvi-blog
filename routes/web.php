<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/','PostsController@index');

Route::prefix('posts')->group(function(){
    Route::get('/create', 'PostsController@create');
    Route::post('/', 'PostsController@store');
    Route::get('/{id}', 'PostsController@show');
    Route::get('/','PostsController@index');

    Route::post('/{id}/comments', 'CommentsController@store');
});

