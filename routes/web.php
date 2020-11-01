<?php

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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/posts', 'PostController@index')->name('posts');
Route::get('/posts/create', 'PostController@create')->name('posts.create');
Route::post('/posts/store', 'PostController@store')->name('posts.store');
Route::get('/posts/edit/{id}', 'PostController@edit')->name('posts.edit');
Route::post('/posts/update/{id}', 'PostController@update')->name('posts.update');
Route::post('/posts/destroy/{id}', 'PostController@destroy')->name('posts.destroy');
Route::get('/comments', 'CommentController@index')->name('comments');
Route::post('/comments/store', 'CommentController@store')->name('comments.store');
Route::post('/comments/destroy/{id}', 'CommentController@destroy')->name('comments.destroy');

Route::get('/{slug}', 'HomeController@show')->name('posts.show');
