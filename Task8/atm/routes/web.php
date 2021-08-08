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

Route::get('Home','HomeController@showWelcome');

Route::get('about', function (){
    return "about content";
});

Route::get('about/directions', function (){
    return "Directions go here";
});

Route::any('submit-form', function (){
    return "Process Form";
});

Route::get('about/classes/theSubject', function ($theSubject){
    return $theSubject. 'connect goes here';
});

Route::get('about/classes/theSubject', function ($theSubject){
    return "connect on $theSubject";
});

Route::get('about/classes/{theArt}/{thePrice}', function ($theArt, $thePrice){
    return "the product $theArt and $thePrice";
});

Route::get('where', function (){
    return Redirect::to('about/directions');
});
