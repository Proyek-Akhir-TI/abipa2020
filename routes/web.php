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

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/ketua/user/roles',['middleware'=>['role','auth','web'], function(){
//     return"";
// }]);
Route::auth();

Route::get('/home', function(){

    $user = Auth::user();
    if($user->isKetua()){
        return view('ketua.index');
    }
    if($user->isPj()){
        return view('pj.index');
    }
    if($user->isPeternak()){
        return view('pj.index');
    }

});

Route::get('/pj/tambah', function(){
    return view('pj.tambah');
});



// Route::get('auth/register', 'Auth\RegisterController@index')
//     ->name('auth.register');

//tambah kelompok
Route::post('/pj/store','TambahKelompokController@store');
Route::get('/pj/index', 'TambahKelompokController@index');
//tambah ketua
Route::post('/pj/storeket', 'TambahKetuaController@store')
    ->name('pj.storeket');
Route::get('/pj/indexket', 'TambahKetuaController@index');