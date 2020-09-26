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
Route::get('/diary/register', 'DiaryController@register')->name('diary.register');
Route::post('/diary/register', 'DiaryController@registerConfirm')->name('diary.register.confirm');
Route::get('/diary', 'DiaryController@index')->name('diary.index');
Route::post('/diary', 'DiaryController@store')->name('diary.store');
Route::get('/diary/{id}', 'DiaryController@edit')->name('diary.edit');
Route::put('/diary/{id}', 'DiaryController@editConfirm')->name('diary.edit.confirm');
Route::put('/diary', 'DiaryController@update')->name('diary.update');
Route::delete('/diary/{id}', 'DiaryController@destroy')->name('diary.destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
