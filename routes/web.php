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

Route::get('/', 'Articles@index')->name('home');
Route::any('/admin/add', 'Admin\Admin@add')->name('admin_add')->middleware('auth');;

Route::get('articles/{article}', 'Articles@view')->name('article');

Auth::routes();
