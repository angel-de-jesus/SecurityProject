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

Route::get('/', function(){
    return view('welcome');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('home', 'HomeController');

//Route::get('home','HomeController@getCoords');

Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin',function(){
        return view ('admin');
    });

    Route::get('/admin', 'HomeController@index2')->name('admin');
    Route::delete('/admin/{id}', 'Admin\HomeController@destroy');
    Route::post('/admin/{id}', 'Admin\HomeController@update');
    

});