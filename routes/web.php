<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/',[App\Http\Controllers\AH\BaseController::class, 'viewAll']);

Route::post('Registration', [App\Http\Controllers\AH\LoginController::class, 'Registration']);
Route::post('login', [App\Http\Controllers\AH\LoginController::class, 'login'])->name('login');
Route::get('logout', [App\Http\Controllers\AH\LoginController::class, 'logout'])->name('logout');

/*admin routs*/
Route::get('Item', [App\Http\Controllers\AH\ItemController::class, 'showAll'])->name('Item');
Route::post('Item', [App\Http\Controllers\AH\ItemController::class, 'showPart']);
