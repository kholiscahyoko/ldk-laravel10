<?php

use App\Http\Controllers\CharacteristicController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MasterBkController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/master_bk', [App\Http\Controllers\MasterBkController::class, 'index'])->name('master_bk');

Route::controller(MasterBkController::class)->group(function(){
    Route::get('/master_bk', 'index');
    Route::get('/master_bk/{id}', 'get');
    Route::post('/master_bk/store', 'store');
    Route::post('/master_bk/update/{id}', 'update');
    Route::post('/master_bk/destroy/{id}', 'destroy');
});

Route::controller(CharacteristicController::class)->group(function(){
    Route::get('/characteristic', 'index');
    Route::get('/characteristic/{id}', 'get');
    Route::post('/characteristic/store', 'store');
    Route::post('/characteristic/update/{id}', 'update');
    Route::post('/characteristic/destroy/{id}', 'destroy');
});

Route::controller(UserController::class)->group(function(){
    Route::get('/user', 'index')->middleware('checkRole:super');
    Route::get('/user/{id}', 'get');
    Route::post('/user/store', 'store');
    Route::post('/user/update/{id}', 'update');
    Route::post('/user/destroy/{id}', 'destroy');
});


/**
 * Log the user out of the application.
 */
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');