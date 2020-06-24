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
    return view('home');
});
Route::get('ase', function () {
    return view('ase');
});
Route::get('lgps', function () {
    return view('lgps');
});
Route::get('gmis', function () {
    return view('gmis');
});
Route::get('lgms', function () {
    return view('lgms');
});
Route::get('sdsm', function () {
    return view('sdsm');
});
Route::get('lgpth', function () {
    return view('lgpth');
});
Route::get('hstl', function () {
    return view('hstl');
});
Route::get('sdham', function () {
    return view('sdham');
});

Route::resource('sample', 'SampleController');
//Route::resource('ase', 'SampleController');
Route::post('sample/in/{id}', 'SampleController@in')->name('sample.in');
Route::post('sample/breakout/{id}', 'SampleController@breakout')->name('sample.breakout');
Route::post('sample/breakin/{id}', 'SampleController@breakin')->name('sample.breakin');
Route::post('sample/out/{id}', 'SampleController@out')->name('sample.out');

Route::post('sample/update', 'SampleController@update')->name('sample.update');
Route::get('sample/destroy/{id}', 'SampleController@destroy');
Route::get('full-text-search', 'Full_text_search_Controller@index');
Route::post('full-text-search/action', 'Full_text_search_Controller@action')->name('full-text-search.action');
Route::get('full-text-search/normal-search', 'Full_text_search_Controller@normal_search')->name('full-text-search.normal-search');
//Route::resource('ase', 'AttendanceController');
