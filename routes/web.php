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
    if(Auth::check()) {
        return redirect('/home');
    } else {
        return redirect('/login');
    }
});

Auth::routes(['register' => false,'reset' => false, 'verify' => false]);

Route::middleware('auth')->name('panel.')->group(function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

    Route::prefix('donnors')->group(function(){
        Route::get('/', 'DonnorsController@index')->name('donnors');
        Route::get('/get-list', 'DonnorsController@getList')->name('donnorsList');
        Route::get('/add', 'DonnorsController@create')->name('addDonnor');
        Route::post('/store', 'DonnorsController@store')->name('storeDonnor');
        Route::get('/edit/{id}', 'DonnorsController@edit')->name('editDonnor');
        Route::post('/edit/{id}', 'DonnorsController@update')->name('updateDonnor');
        Route::get('/visit', 'DonnorsController@addVisit')->name('addVisit');
        Route::post('/visit', 'DonnorsController@storeVisit')->name('storeVisit');
        Route::get('/profile/{id}', 'DonnorsController@show')->name('donnorProfile');
        Route::post('/destroy/{id}', 'DonnorsController@destroy')->name('deleteDonnor');
    });
});

