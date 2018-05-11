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


Auth::routes();

Route::get('/', 'HomeController@index')->name('main');
Route::get('/book', 'BookController@book')->name('book');
Route::get('/summaryreport', 'SumReportController@summaryreport')->name('summaryreport');
Route::get('/lineargraph', 'LneGrhController@lineargraph')->name('lineargraph');    
Route::get('/bargraph', 'BarGrhController@bargraph')->name('bargraph');     
Route::get('/bookversion', 'BookVerController@bookversion')->name('bookversion');
Route::get('/activitylog', 'ActLogController@activitylog')->name('activitylog');    
Route::get('/settings', 'SettingsController@settings')->name('settings');   