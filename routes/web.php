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
use Goutte\Client;
use GuzzleHttp\Client as GuzzleClient;

Route::get('/sad', function() {

    $client = new Client();

    $crawler = Goutte::request('GET', 'https://en.wikipedia.org/wiki/Laravel');
    
    $link = $crawler->selectLink('Main page')->link();
    $crawler = $client->click($link);
    
    $crawler->filter('h2 span.mw-headline')->each(function ($node) {
        echo ("<pre>");
        print $node->text();
        echo ("</pre>");
    });

    // $class = $crawler->filterXPath('//body/h1')->attr('class');

    // echo 'asdasda';
    
    //$crawler->filter('body > h1')->each(function ($node) {
        // print $node->text()."\n";
     //        $test = json_encode($node->text());
     //        print_r($test);
    //});
    
    //$crawler->filter('td.res_rs_td_tit a')->each(function ($node) {
    //   dump($node->text());
     // $test = json_encode($node->text());
     // print_r($test);
   // });
    return view('/book');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('main');
Route::get('/summaryreport', 'SumReportController@summaryreport')->name('summaryreport');
Route::post('/summaryreport/filter', 'SumReportController@filtersummaryreport');
Route::get('/lineargraph', 'LneGrhController@lineargraph')->name('lineargraph');    
Route::get('/bargraph', 'BarGrhController@bargraph')->name('bargraph');     
Route::get('/bookversion', 'BookVerController@bookversion')->name('bookversion');
Route::get('/activitylog', 'ActLogController@activitylog')->name('activitylog'); 


Route::get('/book', 'BookController@book')->name('book');
Route::post('/book/add', 'BookController@addBook');
Route::get('/getBook/{itemId}', 'BookController@getBook'); 
Route::post('/book/update', 'BookController@updateBook'); 
Route::post('/book/delete/{itemId}', 'BookController@deleteBook');

Route::get('/settings', 'SettingsController@semester')->name('settings');
Route::post('/semester/add', 'SettingsController@addSemester');
Route::post('/semester/delete/{itemId}', 'SettingsController@deleteSemester');
Route::get('/semester/{itemId}', 'SettingsController@getSemester'); 
Route::post('/semester/update', 'SettingsController@updateSemester');


//HOME
Route::post('/searchBookTitle', 'HomeController@search_book_title');
Route::post('/saveBorrowBook', 'HomeController@saveBorrowBook');

//ACTIVITY
Route::get('/getActivityLogs', 'ActLogController@getActivityLogs');

//GRAPHS
Route::get('/procurement/book-utilization/{itemId}', 'SumReportController@getBookUtilizationById')->name('get-book-utilization');
Route::get('/procurement/ajax-get-book-utils/{itemId}', 'SumReportController@ajaxGetSemAveUtilization')->name('get-book-utilization-ajax');
Route::get('/procurement/book-shortages', 'SumReportController@generateBookShortages')->name('get-book-shortages');
