<?php

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'LoginController@index');
Route::post('/login', 'LoginController@login');
// Route::get('/view', 'UserController@index');

Route::group(['prefix' => 'user'], function() {
    Route::get('/create', ['as' => 'createUser', 'uses' => 'UserController@create']);
    Route::post('/create', 'userController@store');
	Route::get('/view', ['as' => 'userView', 'uses' => 'UserController@index']);
	
    Route::get('/delete/{id}', ['as' => 'userDelete', 'uses' => 'userController@destroy']);
    Route::get('/edit/{id}', ['as' => 'userEdit', 'uses' => 'userController@edit']);
    Route::post('/update/{id}', ['as' => 'userUpdate', 'uses' => 'userController@update']);
});
