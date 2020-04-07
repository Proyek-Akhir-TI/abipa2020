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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('landing');
});

// Route::get('/login2', function () {
//     return view('login');
// });

// Route::get('/ketua', function () {
//     return view('ketua.index');
// });

Route::get('/pj', function () {
    return view('pj.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/ketua/user/roles',['middleware'=>['role','auth','web'], function(){
//     return"";
// }]);