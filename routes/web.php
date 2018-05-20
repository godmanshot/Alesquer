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

Route::get('/', 'HomeController@index')->name('home')->middleware('auth');

Route::resource('person', 'PersonController')->middleware('auth');
Route::resource('course', 'CourseController')->middleware('auth');
Route::resource('record', 'RecordController')->middleware('auth');
Route::resource('teacher', 'TeacherController')->middleware('auth');
Route::resource('application', 'ApplicationController')->middleware('auth');
Route::get('/app/record/{record}', 'ApplicationController@record')->name('application.record')->middleware('auth');
