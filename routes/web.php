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

Route::get('/logout', 'LoginController@logout');

Route::prefix('login')->group(function(){
    Route::get('/', 'LoginController@index')->name('login');
    Route::post('/', 'LoginController@login');
});


Route::prefix('register')->group(function() {
    Route::get('/', 'RegisterController@create');
    Route::post('/', 'RegisterController@store');
});

Route::get('/posts','PostsController@index');
Route::group(['prefix'=>'posts','middleware'=>['auth']],function(){ // //sve rute smo zastitili sa middleware=>auth, korisnik koji nije ulogovan ne moze da kreira post..., i ovako ubuduce da definisemo prefix
    Route::get('/create', 'PostsController@create'); ///->middleware('auth');
    Route::post('/', 'PostsController@store');
    Route::get('/{id}', 'PostsController@show');


Route::prefix('/{postId}/comments')->group(function(){ 
    Route::post('/', 'CommentsController@store');
    Route::post('/{commentId}', 'CommentsController@destroy');


    
}); 
});

Route::get('/users/{id}', 'UsersController@show'); 
Route::get('/posts/tags/{tag}', 'TagsController@index');

