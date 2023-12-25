<?php

use App\Http\Controllers\CharacteristicController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MasterBkController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\LdkController;

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

Route::controller(MasterBkController::class)->group(function(){
    Route::get('/master_bk', 'index')->can('view-master-bk');
    Route::get('/master_bk/{id}', 'get')->can('view-master-bk');
    Route::post('/master_bk/store', 'store')->can('manage-master-bk');
    Route::post('/master_bk/update/{id}', 'update')->can('manage-master-bk');
    Route::post('/master_bk/reject/{id}', 'reject')->can('manage-master-bk');
    Route::post('/master_bk/destroy/{id}', 'destroy')->can('manage-master-bk');
});

Route::controller(CharacteristicController::class)->group(function(){
    Route::get('/characteristic', 'index')->can('manage-characteristic');
    Route::get('/characteristic/all', 'getAll');
    Route::get('/characteristic/{id}', 'get');
    Route::post('/characteristic/store', 'store')->can('manage-characteristic');
    Route::post('/characteristic/update/{id}', 'update')->can('manage-characteristic');
    Route::post('/characteristic/destroy/{id}', 'destroy')->can('manage-characteristic');
});

Route::controller(UserController::class)->group(function(){
    Route::get('/user', 'index')->can('manage-user');
    Route::get('/user/{id}', 'get')->can('manage-user');
    Route::post('/user/store', 'store')->can('manage-user');
    Route::post('/user/update/{id}', 'update')->can('manage-user');
    Route::post('/user/destroy/{id}', 'destroy')->can('manage-user');
});

Route::controller(LocationController::class)->group(function(){
    Route::get('/location', 'index')->can('view-location');
    Route::get('/location/{id}', 'get')->can('view-location');
    Route::post('/location/store', 'store')->can('manage-location');
    Route::post('/location/update/{id}', 'update')->can('manage-location');
    Route::post('/location/destroy/{id}', 'destroy')->can('manage-location');
});

Route::controller(LdkController::class)->group(function(){
    Route::get('/ldk', 'index')->can('view-ldk');;
    Route::get('/ldk/{id}', 'get')->can('view-ldk');
    Route::post('/ldk/store', 'store')->can('manage-ldk');
    Route::post('/ldk/update/{id}', 'update')->can('manage-ldk');
    Route::post('/ldk/destroy/{id}', 'destroy')->can('manage-ldk');
});


/**
 * Log the user out of the application.
 */
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');