<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index')->name('index');
Route::get('/posts', 'PostController@index')->name('posts.index');
Route::get('/posts/{slug}', 'PostController@show')->name('posts.show');


Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

route::prefix('admin')
    ->namespace('Admin')
    ->middleware('auth')
    ->name('admin.')
    ->group(function() {
        Route::get('/', 'HomeController@index')->name('index');

        Route::get('/posts', 'PostController@index') ->name('posts.index');
        Route::post('/post', 'PostController@store') ->name('posts.store');

        Route::get('/posts/create', 'PostController@create') ->name('posts.create');

        Route::get('/posts/{slug}', 'PostController@show') ->name('posts.show'); 

        Route::match(['PUT', 'PATCH'], '/posts/{slug}', 'PostController@update') ->name('posts.update'); 

        Route::delete('posts/{slug}', 'PostController@destroy')->name('posts.destroy');

        Route::get('/posts/{slug}/edit', 'PostController@edit') ->name('posts.edit'); 

        // Route::resource("/posts", "PostController");
    });

