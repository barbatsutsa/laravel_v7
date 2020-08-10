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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'NewsController@index')
     ->name('index');
Route::get('/news/{id}.html', 'NewsController@show')
    ->where('id', '\d+')
    ->name('news.show');
Route::get('/news/review', 'NewsController@review')
    ->name('news.review');
Route::post('/news/review/store', 'NewsController@storeReview')
    ->name('news.review.store');
Route::get('/news/order', 'NewsController@order')
    ->name('news.order');
Route::post('/news/order/store', 'NewsController@storeOrder')
    ->name('news.order.store');


//for admin
Route::group(['prefix' => 'admin'], function() {
    Route::get('/', 'Admin\IndexController@index')
        ->name('admin');
    Route::get('/news', 'Admin\NewsController@index')
        ->name('admin.news');
    Route::get('/news/create', 'Admin\NewsController@create')
        ->name('admin.news.create');
    Route::post('/news/store', 'Admin\NewsController@store')
        ->name('admin.news.store');
    Route::get('/news/{id}/edit', 'Admin\NewsController@edit')
        ->where('id', '\d+')
        ->name('admin.news.edit');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
