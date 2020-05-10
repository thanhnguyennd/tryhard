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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/search/{key_search}', 'HomeController@search')->name('search');
Route::post('/postSearch', 'HomeController@postSearch')->name('home.search');

Route::get('/videos/{id}', 'VideoController@index')->name('videos');


Route::group(['prefix' => 'posts'], function () {
    Route::get('/', 'PostController@index')->name('posts.index');
    Route::get('create', 'PostController@create')->name('posts.create');
    Route::get('edit/{id}', 'PostController@edit')->name('posts.edit');
    Route::post('update', 'PostController@update')->name('posts.update');
    Route::get('show', 'PostController@show')->name('posts.show');
    Route::post('store', 'PostController@store')->name('posts.store');
    Route::delete('destroy/{id}', 'PostController@destroy')->name('posts.destroy');
    Route::post('publish/{id}', 'PostController@publish')->name('posts.publish');
});

Route::post('/videos/post', 'VideoController@store');
Route::post('/videos/delete', 'VideoController@delete');
Route::get('/api/user/words', 'UserWordController@getListWords');

Route::get('/channel/{user_id}}', 'ChannelController@index')->name('channel');

Route::group(['prefix' => 'user/posts'], function () {
    Route::get('/', 'UserPostController@index')->name('user_posts.index');
    Route::get('create', 'UserPostController@create')->name('user_posts.create');
    Route::get('edit/{id}', 'UserPostController@edit')->name('user_posts.edit');
    Route::post('update', 'UserPostController@update')->name('user_posts.update');
    Route::get('show', 'UserPostController@show')->name('user_posts.show');
    Route::post('store', 'UserPostController@store')->name('user_posts.store');
    Route::delete('destroy/{id}', 'UserPostController@destroy')->name('user_posts.destroy');
    Route::post('publish/{id}', 'UserPostController@publish')->name('user_posts.publish');
});

Route::group(['prefix' => 'user/words'], function () {
    Route::get('/{search_key?}', 'UserWordController@index')->name('user_words.index');
    Route::get('create', 'UserWordController@create')->name('user_words.create');
    Route::get('edit/{id}', 'UserWordController@edit')->name('user_words.edit');
    Route::post('update', 'UserWordController@update')->name('user_words.update');
    Route::get('show', 'UserWordController@show')->name('user_words.show');
    Route::post('store', 'UserWordController@store')->name('user_words.store');
    Route::delete('destroy/{id}', 'UserWordController@destroy')->name('user_words.destroy');
    Route::post('search', 'UserWordController@search')->name('user_words.search');
});

Route::get('user/data', 'UserWordController@data')->name('user_words.data');
Route::get('/api/user/data', 'UserWordController@getdata');
Route::get('/api/load/posts/{page_num}', 'HomeController@ajaxRequestPost');
Route::get('/api/search/{page_num}/{key_search}', 'HomeController@ajaxRequestSearch');

Route::middleware('auth:api')->get('/route-cache',function (){
    $exitCode = \Illuminate\Support\Facades\Artisan::call('route:cache');
    return 'Route cache cleared';
});
Route::middleware('auth:api')->get('/config-cache',function (){
    $exitCode = \Illuminate\Support\Facades\Artisan::call('config:cache');
    return 'Config cache cleared';
});
Route::middleware('auth:api')->get('/clear-cache',function (){
    $exitCode = \Illuminate\Support\Facades\Artisan::call('clear:cache');
    return 'Clear cache cleared';
});
Route::middleware('auth:api')->get('/view-cache',function (){
    $exitCode = \Illuminate\Support\Facades\Artisan::call('view:cache');
    return 'View cache cleared';
});

Route::group(['prefix' => 'sentences'], function () {
    Route::get('/', 'SentenceController@index')->name('sentences.index');
    Route::get('create', 'SentenceController@create')->name('sentences.create');
    Route::get('edit', 'SentenceController@edit')->name('sentences.edit');
    Route::post('update', 'SentenceController@update')->name('sentences.update');
    Route::get('show', 'SentenceController@show')->name('sentences.show');
    Route::post('store', 'SentenceController@store')->name('sentences.store');
    Route::get('destroy/{id}', 'SentenceController@destroy')->name('sentences.destroy');
});

Route::middleware('auth:api')->get('/encrypt/id={id}&type={type}', function ($id, $type) {
    return UrlId::encrypt($id, $type);
});
Route::middleware('auth:api')->get('/decrypt/{id}', function ($id) {
    return UrlId::decrypt($id);
});
