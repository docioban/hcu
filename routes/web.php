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
    Route::resource('candidate', 'CandidateController')->only([
        'update'
    ]);
});

Route::group([
    'prefix' => '{locale}',
    'where' => ['locale' => '[a-zA-Z]{2}'],
    'middleware' => 'setlocale'],
    function () {

        Route::post('/main', 'Geo_locationController@index');

        Route::get('/constituencies', 'ConstituencyController@constituency_all');

        Route::get('/constituency/{slug}', 'ConstituencyController@constituency');

        Route::get('/candidate/{slug}', 'CandidateController@candidate');

        Route::get('/live_search', 'LiveSearchController@index');
        Route::get('/live_search/action', 'LiveSearchController@action');
    }
);