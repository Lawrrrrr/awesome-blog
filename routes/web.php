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
Route::get('/home/edit', 'HomeController@edit')->name('home.edit');
Route::get('/home/change-avatar', 'HomeController@changeAvatar')->name('home.change_avatar');
Route::get('/users', 'UserController@list')->name('users.list');
Route::get('/post/{id}/edit', 'PostController@edit')->name('posts.edit');
Route::get('/user/{id}/show', 'UserController@show')->name('users.show');
Route::get('/follow/user/{followed_id}', 'UserController@follow')->name('users.follow');
Route::get('/unfollow/user/{followed_id}', 'UserController@unfollow')->name('users.unfollow');
Route::get('/followers/{followed_id}', 'UserController@userFollowers')->name('users.followers');
Route::get('/following/{followed_id}', 'UserController@userFollowing')->name('users.following');
// Route::get('/user/{id}/show', 'UserController@posts')->name('users.show');

Route::post('/post', 'PostController@store')->name('post');
Route::post('/post/{id}/update', 'PostController@update')->name('posts.update');

Route::delete('/post/{id}/delete', 'PostController@delete')->name('posts.delete');

Route::patch('/home/update', 'HomeController@update')->name('home.update');
Route::patch('/home/upload', 'HomeController@uploadAvatar')->name('home.upload_avatar');
