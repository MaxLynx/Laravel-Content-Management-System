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

Route::get('/app', 'PageController@main');

Route::get('/app/{codeOrLang}', 'PageController@showShortVersion');

Route::get('/app/{code}/{lang}', 'PageController@showFullVersion');

Route::get('/admin', 'AdminController@index')->name('index');

Route::get('/admin/create', 'AdminController@showCreateForm');

Route::post('/admin/create/{parentCode}', 'AdminController@store');

Route::get('/admin/{code}/edit', 'AdminController@showEditForm');

Route::post('/admin/update/{parentCode}', 'AdminController@update');

Route::post('/admin/delete/{parentCode}', 'AdminController@delete');


