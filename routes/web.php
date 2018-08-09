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
    //return view('welcome');
    return redirect("/home");
});

Auth::routes();

//推特学习路由
Route::get('/home', 'HomeController@index')->name('home');
Route::post('tweet/save', 'twitter\PostController@store');
Route::get('posts', 'twitter\PostController@index')->name('posts.index');
Route::get('users/{user}/follow', 'users\UserController@follow')->name('user.follow');
Route::get('users/{user}/unfollow', 'users\UserController@unfollow')->name('user.unfollow');
Route::get('users/{user}', 'users\UserController@show')->name('user.show');