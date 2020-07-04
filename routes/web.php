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
Route::group(['namespace' => 'Blog'], function () {
    Route::get('/', 'PostController@index')->name('main');
    Route::get('post/{slug}','PostController@show')->name('post');
    Route::get('archive/{date}','PostController@archive')->name('archive');
    Route::resource('comment', 'BlogCommentController')->only(['create', 'destroy']);
});

Route::group(['namespace' => 'Blog', 'prefix' => 'tag'],function () {
    Route::get('{slug}', 'CategoryController@show');
});

//Route::group(['namespace' => 'Blog', 'prefix' => 'admin\blog'], function () {
////    Route::resource('posts', 'PostController')->names('blog.posts');
////    Route::resource('tag', 'CategoryController')->names('blog.category');
////});

Auth::routes();
