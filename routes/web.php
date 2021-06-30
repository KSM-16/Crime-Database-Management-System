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

Route::get('/', 'pagecontrol@index');
Route::get('/page',  'pagecontrol@page');
Route::get('/insert', 'pagecontrol@insert');
Route::get('/nav', 'pagecontrol@nav');
Route::get('/footer', 'pagecontrol@footer');
Route::get('/search', 'pagecontrol@search' );
Route::get('/retpoter', 'pagecontrol@reporter' );
Route::get('/victim', 'pagecontrol@victim' );
Route::get('/suspect','pagecontrol@suspect') ;
Route::get('/criminal', 'pagecontrol@criminal' );
Route::get('/update', 'pagecontrol@update');
Route::get('/ucrime', 'pagecontrol@ucrime' );
Route::get('/ucriminal', 'pagecontrol@ucriminal' );
Route::get('/uvictim', 'pagecontrol@uvictim' );
Route::get('/ususpect', 'pagecontrol@ususpect' );
Route::get('/ureport', 'pagecontrol@ureport' );
Route::get('/update', 'pagecontrol@delete');
