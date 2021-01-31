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

Route::get('admin/home', 'HomeController@adminHome')->name('admin.home')->middleware('is_admin');

Route::get('/','WelcomeController@index');


/*
Route::get('/', function () {
    return view('welcome');
});
*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('hotels', 'UserAdmin\HotelsController');

    Route::get('image', 'UserAdmin\HotelsImagesController@index')->name('image');
    Route::post('image', 'UserAdmin\HotelsImagesController@upload');
    Route::delete('image/{id}', 'UserAdmin\HotelsImagesController@destroy');
});


Route::get('/design', function () {
    return view('design');
});

/*
Route::resource('images', 'UserAdmin\HotelsImagesController',
     ['only' => [ 'index', 'upload','destroy' ]]);
     */

