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
//Route::get('/',function (){
//    return \App\Models\warehouse::all();
//});
Route::get('/',[\App\Http\Controllers\HomeController::class,'index']);
Route::get('/add',[\App\Http\Controllers\HomeController::class,'add']);
Route::post('add',[\App\Http\Controllers\HomeController::class,'wareHouse'])->name('wareHouse');
Route::post('/',[\App\Http\Controllers\HomeController::class,'index'])->name('index');
Route::get('/',[\App\Http\Controllers\HomeController::class,'getDashboard']);
