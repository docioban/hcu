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
//
//Route::get('/', function () {
//    return redirect(app()->getLocale());
//});


Route::get('/live_search', 'LiveSearchController@index');
Route::post('/live_search/action', 'LiveSearchController@action')->name('live_search.action');
//
//Route::post('/', function () {
//    return redirect(app()->getLocale());
//});

//Route::get('/constituency/{slug}', 'ConstituencyController@show')->name('constituency.show');

Route::group([
    'prefix' => '{locale}',
    'where' => ['locale' => '[a-zA-Z]{2}'], 
    'middleware' => 'setlocale'], function() {

//    Route::get('/', 'HomeController@welcome')->name('main');
//
//    Route::post('/', 'HomeController@index')->name('get_location');

    Route::resource('/candidate', 'CandidateController');

    Route::resource('/locality', 'LocalityController');


//    Route::get('/dashboard', function () {
//        return view('crud/dashboard');
//    });

    Auth::routes();
});