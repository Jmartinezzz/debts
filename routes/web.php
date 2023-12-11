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

Route::get('/debtor-detail/{debtor}', function () {
    return view('debts');
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/debtor-detail/{debtor}', [App\Http\Controllers\HomeController::class, 'detail'])->name('debts.detail');

Route::get('/porcentaje-descuento', [App\Http\Controllers\HomeController::class, 'dicountPercent'])->name('discount.percent');
Route::get('/cheyo-house-invitacion', [App\Http\Controllers\HomeController::class, 'envelope'])->name('envelope');
