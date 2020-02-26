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
    Route::view('/login', 'auth.login')->name('login');

    Route::post('/login', 'Auth\ClientAuthorizationController')
        ->name('login');
});

Route::group(['middleware' => ['auth']], function () {
    Route::name('dashboard')->group(function () {
        Route::get('/', 'GeneralDashboardController');
        Route::get('home', 'GeneralDashboardController');
        Route::get('dashboard', 'GeneralDashboardController');
    });

    Route::post('/logout', 'Auth\ClientLogoutController')
        ->name('logout');

    Route::middleware(['check-role:guest'])
        ->name('guest.')
        ->namespace('Guest')
        ->prefix('guest')
        ->group(function () {
            Route::view('/', 'guest.dashboard')
                ->name('dashboard');
        });

    Route::middleware(['check-role:student'])
        ->name('student.')
        ->namespace('Student')
        ->prefix('student')
        ->group(function () {
            Route::get('/', 'DashboardController')
                ->name('dashboard');

            Route::resource('punch-in-logs', 'PunchInLogController')
                ->except(['edit', 'update', 'destroy']);

            Route::resource('punch-in-logs', 'PunchInLogController')
                ->only(['edit', 'update', 'destroy'])
                ->middleware('ProtectConfirmedPunchInLogAgainstEditing');
        });

    Route::middleware(['check-role:coordinator'])
        ->name('coordinator.')
        ->namespace('Coordinator')
        ->prefix('coordinator')
        ->group(function () {
            Route::get('/', 'DashboardController')
                ->name('dashboard');

            Route::get('students/{uuid}/', 'StudentProfileController')
                ->name('student-profile');

            Route::resource('students.punch-in-logs', 'PunchInLogController')
                ->only(['index']);

            Route::resource('punch-in-logs', 'PunchInLogController')
                ->only(['show']);

            Route::resource('punch-in-logs', 'PunchInLogController')
                ->only(['edit', 'update'])
                ->middleware('ProtectConfirmedPunchInLogAgainstEditing');
        });
});
