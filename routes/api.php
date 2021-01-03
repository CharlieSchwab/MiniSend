<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// According to the CRUD operations of the MailController, I have created five API routes
// for email creation, editing, reading, mass viewing and deletion. Also a test router for email testing.


Route::get('sendtest','App\Http\Controllers\MailController@sendtest');

Route::post('create', 'App\Http\Controllers\MailController@create');
Route::get('read_all', 'App\Http\Controllers\MailController@read_all');
Route::get('read_one/{id}', 'App\Http\Controllers\MailController@read_one');
Route::post('update/{id}', 'App\Http\Controllers\MailController@update');
Route::delete('delete/{id}', 'App\Http\Controllers\MailController@delete');
