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
    Route::resource('group', 'GroupController');
    Route::resource('forecast', 'ForecastController');
    Route::get('/group/add/{token}', function($token){ 
        return view('user.group.addUserGroup')->with(compact('token'));
    })->name('group.add');
    Route::get('/group/addUser/{token}', 'GroupController@relacionarUsuario')->name('group.addUser');
    Route::get('/terminos', function(){
        return view('user.terminosServicio');
    })->name('terminos');
    Route::get('/help', function(){
        return view('user.help');
    })->name('help');
});




