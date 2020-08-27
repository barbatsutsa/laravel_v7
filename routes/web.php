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
Route::group(['middleware' => 'auth'], function () {
    Route::get('/account', 'Account\IndexController@index')->name('account');

    Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {
        Route::get('/', 'Admin\IndexController@index')
            ->name('admin');
        Route::resource('/news', 'Admin\NewsController');

        Route::match(['post', 'get'], '/profile', 'Admin\ProfileController@update')
            ->name('admin.profile.update');

        Route::resource('/feedback', 'Admin\FeedbackController');

        Route::get('/add', 'Admin\NewsController@add')
            ->name('admin.add');

    });
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

Route::get('/parsing/news', 'ParserController@index')->name('news.parser');
Route::get('/parsing/{cat}', 'ParserController@add')->name('news.parser.add');

//auth socialite
Route::get('/auth/vk', 'Auth\SocialController@loginVK')->name('vk.login');
Route::get('/auth/vk/callback', 'Auth\SocialController@callbackVK')->name('vk.callback');

Route::get('/auth/fb', 'Auth\SocialController@loginFB')->name('fb.login');
Route::get('/auth/fb/callback', 'Auth\SocialController@callbackFB')->name('fb.callback');
