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
    return redirect(app()->getLocale());
});

Route::group([
    'prefix' => '{locale}', 
    'where' => ['locale' => '[a-zA-Z]{2}'], 
    'middleware' => 'setlocale'], function() {

    Route::post('/district', 'HomeController@get_district');
    
    Route::get('/', 'HomeController@index')->name('/');

    Route::get('importView', 'ImportController@importExportView');

    Route::post('import', 'ImportController@import')->name('import');

    Route::post('/home', 'HomeController@welcome');

    Route::get('/search', 'HomeController@search');

    Route::get('/constituence', 'HomeController@search');

    Auth::routes();
});