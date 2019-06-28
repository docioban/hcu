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

//Route::get('/', function () {
//    return redirect(app()->getLocale());
//});


Route::get('/live_search', 'LiveSearchController@index');
Route::post('/live_search/action', 'LiveSearchController@action')->name('live_search.action');

Route::group([
    'prefix' => '{locale}', 
    'where' => ['locale' => '[a-zA-Z]{2}'], 
    'middleware' => 'setlocale'], function() {

    Route::post('/district', 'HomeController@get_district');
    
//    Route::get('/', 'HomeController@index')->name('/');

    Route::get('importView', 'ImportController@importExportView');

    Route::post('import', 'ImportController@import')->name('import');

    Route::get('/home', 'HomeController@welcome');

//    Route::get('/', 'LiveSearchController@index');
//
//    Route::get('/search', 'LiveSearchController@search');

    Route::get('/constituencies', 'HomeController@search');

    Auth::routes();
});