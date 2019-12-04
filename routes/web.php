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

Route::group(['middleware' => ['guest']], function () {
    Route::view('/authorize', 'auth.authorize');
    Route::get('/authorization', 'Auth\ClientAuthorizationController')->name('authorization');
});

Route::group(['middleware' => ['auth']], function () {
    Route::post('/logout', 'Auth\ClientLogoutController')->name('logout');

    Route::get('/dashboard', 'DashboardController')->name('dashboard');
    Route::get('/punch-in-log', 'PunchInLogController@index')->name('punch-in-log');
});

Route::get('/', function () {
    return view('welcome');
});

Route::redirect('/home', '/dashboard');
Route::redirect('/login', '/authorize')->name('login');
