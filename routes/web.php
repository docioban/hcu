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


Route::get('/live_search', 'LiveSearchController@index');
Route::post('/live_search/action', 'LiveSearchController@action')->name('live_search.action');

Route::post('/', function () {
    return redirect(app()->getLocale());
});

Route::group([
    'prefix' => '{locale}',
    'where' => ['locale' => '[a-zA-Z]{2}'], 
    'middleware' => 'setlocale'], function() {

    Route::post('/district', 'HomeController@get_district');

    Route::get('/', 'HomeController@welcome')->name('main');

    Route::post('/', 'HomeController@index')->name('get_location');

    Route::get('importView', 'ImportController@importExportView');

    Route::post('import', 'ImportController@import')->name('import');

    Route::post('/home', 'HomeController@welcome');

    Route::get('/search', 'HomeController@search');

    Route::resource('/candidate', 'CandidateController');

    Route::resource('/locality', 'LocalityController');

    Route::get('/dashboard', function () {
        return view('crud/dashboard');
    });


//    Route::get('constituencies/{constituence}', 'ConstituenceController@show')->name('cons');



    Auth::routes();

    Route::get('/admin', 'DashboardController@index')->name('dashboard');

    // Route::get('/constituency', 'ConstituencyController@index')->name('constituency_list');

    // //Route::get('/constituency/{slug}', 'ConstituencyController@show')->name('constituency.show');

    // Route::get('constituency/{constituency}', 'ConstituencyController@show')->name('constituency_show');

    // Route::get('constituency/view', 'ConstituencyController@index');

    // Route::post('constituency', 'ConstituencyController@store');

    // Route::put('constituency/{user}', 'ConstituencyController@update');

    // Route::delete('constituency/{user}', 'ConstituencyController@destroy');

    Route::resource('constituency', 'ConstituencyController');

});