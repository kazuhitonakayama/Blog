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
Route::get('/posts/create','PostsController@create');
Route::get('/','PostsController@index');
/* ->whereの記述により、/posts/{id}には数字のみ引用されることとなり、のちのルーティングとのバッティングが起こらない */
Route::get('/posts/{id}','PostsController@show')->where('post','[0-9]+');
Route::post('/posts','PostsController@store');
Route::get('/posts/{id}/edit','PostsController@edit');
/* 編集の際にはpatchメソッドを使用する */
Route::patch('/posts/{id}','PostsController@update');
/** 投稿の削除機能 */
Route::delete('/posts/{id}','PostsController@destroy');


