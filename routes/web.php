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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/programs', 'ProgramsController@index');
Route::post('/programs', 'ProgramsController@store');
Route::patch('/programs/{program_id}', 'ProgramsController@update');
Route::delete('/programs/{program_id}', 'ProgramsController@destroy');
