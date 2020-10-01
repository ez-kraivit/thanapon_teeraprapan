<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
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

Route::get('/', 'GeneralController@indexhome')->name('home');
Route::get('/list_csv', 'GeneralController@indexlistcsv')->name('list.csv');
Route::get('/show_csv/{number_bill}', 'GeneralController@showcsv')->name('show.csv');

Route::get('/download_csv/{number_bill}', 'GeneralController@donwloadcsv')->name('dowload.csv');

Route::get('/print', 'GeneralController@indexprint')->name('print');
Route::post('/importcsv', 'GeneralController@import_csv')->name('import.csv');
Route::post('/checkcsv', 'GeneralController@check_csv')->name('check.csv');

Route::delete('/delete/{id}', 'GeneralController@delete_csv')->name('delete.csv');

Route::get('/kraivit', function () {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    return redirect()->route('home');
});