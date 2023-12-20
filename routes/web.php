<?php

use Illuminate\Support\Facades\Route;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', [HomeController::class, 'index']);
Route::get('/', [IndexController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/master_bk', [App\Http\Controllers\MasterBkController::class, 'index'])->name('master_bk');

Route::controller(MasterBkController::class)->group(function(){
    Route::get('/master_bk', 'index');
    Route::post('/user/store', 'store');
    Route::post('/user/update/{id}', 'update');
    Route::post('/user/destroy/{id}', 'destroy');
});

Route::controller(UserController::class)->group(function(){
    Route::get('/user', 'index');
    Route::post('/user/store', 'store');
    Route::post('/user/update/{id}', 'update');
    Route::post('/user/destroy/{id}', 'destroy');
});
