<?php

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

Auth::routes();

Route::middleware(['auth'])->group(function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/admin', function(){    // Ruta del indice de la administración de la aplicación
        return view('admin.index');
    })->name('admin'); 
    Route::resource('tournament', 'TournamentController');
    Route::resource('team', 'TeamController');
    Route::resource('match', 'MatchController');
    Route::resource('fixture', 'FixtureController');



});




