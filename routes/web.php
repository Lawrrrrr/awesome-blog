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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users', 'UserController@list')->name('users.list');
Route::get('/post/{id}/edit', 'PostController@edit')->name('posts.edit');

Route::post('/post', 'PostController@store')->name('post');
Route::post('/post/{id}/update', 'PostController@update')->name('posts.update');

Route::delete('/post/{id}/delete', 'PostController@delete')->name('posts.delete');
