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

Route::get('/categories', function() {
    $c = \App\Models\Category::with('news')->get();
    dd($c);
});
Route::get('/', 'NewsController@index')
     ->name('index');
Route::get('/category/{category}', 'CategoryController@show')->name('category');
Route::get('/news/{id}.html', 'NewsController@show')
    ->where('id', '\d+')
    ->name('news');

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
    Route::resource('/news', 'Admin\NewsController');

    Route::resource('/feedback', 'Admin\FeedbackController');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/collections', function() {
    $collection = collect([
        100,
        200,
        500,
        900,
        1200
    ]);

    $collection->dd(1);
});
