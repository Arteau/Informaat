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


Route::get('/posts', 'PostController@index')->name('posts');
Route::get('/posts/create', 'PostController@create')->name('create_post');
Route::get('/posts/{post}', 'PostController@show')->name('post');
Route::get('/posts/{post}/edit', 'PostController@edit')->name('edit_post');
Route::post('/posts', 'PostController@store')->name('save_post');
Route::patch('/posts/{post}/update', 'PostController@update')->name('update_post');
Route::patch('/posts/{post}/delete', 'PostController@delete')->name('delete_post');

Route::get('/posts/{post}/comment/{comment}/edit', 'CommentController@edit')->name('edit_comment');
Route::patch('/posts/{post}/comment/{comment}/update', 'CommentController@update')->name('update_comment');
Route::post('/posts/{post}/comment/store', 'CommentController@store')->name('store_comment');
Route::patch('/posts/{post}/comment/{comment}/delete', 'CommentController@delete')->name('delete_comment');
Route::get('/posts/{post}/comment/{comment}/upvote', 'CommentController@upvote');
Route::get('/posts/{post}/comment/{comment}/downvote', 'CommentController@downvote');
Route::get('/posts/{post}/comment/{comment}/cancelvote', 'CommentController@cancelvote');
