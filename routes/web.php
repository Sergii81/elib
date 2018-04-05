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

Route::any('take/{id}', 'BookUserController@takeBook')->name('takeBook');

Route::any('bookuser', 'BookUserController@bookUserStore')->name('bookUser');

Route::any('return/{id}', 'BookUserController@returnBook')->name('return');
    
Route::any('read/{id}', 'BookUserController@readBook')->name('read');

//Route::any('debtors', 'BookUserController@debtors')->name('debtors');

Route::get('user_books', 'BookUserController@userBooks')->name('user_books');
    
Route::resource('admin', 'BookController');

Route::resource('user', 'UserController');