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

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});


Route::group([
    'prefix' => '{locale}',
    'where' => ['locale' => '[a-zA-Z]{2}'],
    'middleware' => 'setlocale'], function() {

        Route::post('/main', 'HomeController@index');

        Route::get('/constituencies', 'HomeController@constituency_all');

        Route::get('/constituency/{slug}', 'HomeController@constituency');

        Route::get('/candidate/{candidate}', 'HomeController@candidate');

    Route::get('/live_search', 'LiveSearchController@index');
    Route::post('/live_search/action', 'LiveSearchController@action');//->name('live_search.action');
    }
    );