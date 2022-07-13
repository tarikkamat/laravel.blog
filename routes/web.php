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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->name('admin')->group(function () {

    /* Login Route */
    Route::get('/login', [\App\Http\Controllers\Auth\LoginController::class, 'index']);
    Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'loginAction'])
        ->name('.login');
    /* Login Route */

    Route::middleware('auth')->group(function () {

        Route::get('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logoutAction'])
            ->name('.logout');
        Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])
            ->name('.dashboard');

        /* Category Routes */
        Route::prefix('category')->name('.category')->group(function () {
            Route::get('/index', [\App\Http\Controllers\CategoryController::class, 'index'])
                ->name('.index');
            Route::get('/create', [\App\Http\Controllers\CategoryController::class, 'create'])
                ->name('.create');
            Route::post('/create', [\App\Http\Controllers\CategoryController::class, 'store'])
                ->name('.store');
            Route::get('/edit/{id}', [\App\Http\Controllers\CategoryController::class, 'edit'])
                ->name('.edit');
            Route::post('/edit/{id}', [\App\Http\Controllers\CategoryController::class, 'update'])
                ->name('.update');
            Route::get('/destroy/{id}', [\App\Http\Controllers\CategoryController::class, 'destroy'])
                ->name('.destroy');
        });
        /* Category Routes */


    });

});
