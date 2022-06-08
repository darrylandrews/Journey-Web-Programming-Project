<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'viewController@home');
Route::get('/category/{id}', 'viewController@Category');

Route::get('/login', 'AuthController@loginP');
Route::post('/login', 'AuthController@login');

Route::get('/register', 'AuthController@registerP');
Route::post('/register', 'AuthController@register');

Route::get('/logout', 'AuthController@logout');

Route::get('/article/{id}', 'viewController@article');

Route::get('/userP', 'viewController@userP');
Route::get('/userD/{id}', 'viewController@userD');

Route::get('/updateP', 'AuthController@updateP');
Route::post('/updateP', 'AuthController@update');

Route::get('/blog', 'viewController@blog');
Route::get('/blogD/{id}', 'viewController@blogD');

Route::get('/blogC', 'viewController@blogC');
Route::post('/blogC', 'viewController@blogCreate');

Route::get('/viewUser/{id}', 'viewController@viewU');