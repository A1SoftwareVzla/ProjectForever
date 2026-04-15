<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\TournamentController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\FixtureController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\ForecastController;
use App\Http\Controllers\BetController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'auth' => [
            'user' => fn() => auth()->user() ? [
                'id' => auth()->user()->id,
                'name' => auth()->user()->name,
                'email' => auth()->user()->email,
            ] : null,
        ],
    ]);
})->name('home');

// Auth Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// Authenticated Routes
Route::middleware(['auth'])->group(function(){
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    
    // Admin section
    Route::get('/admin', function(){
        return Inertia::render('Admin/Index');
    })->name('admin');
    
    // Resource routes
    Route::resource('tournament', TournamentController::class);
    Route::resource('team', TeamController::class);
    Route::resource('match', MatchController::class);
    Route::resource('fixture', FixtureController::class);
    Route::resource('group', GroupController::class);
    Route::resource('forecast', ForecastController::class);
    
    // Bet routes
    Route::get('/bet/store/{match_id}/{forecast_id}/{forecast}', [BetController::class, 'store'])->name('bet.store');
    
    // Group routes
    Route::get('/group/add/{token}', function($token){
        return Inertia::render('User/Group/AddUserGroup', ['token' => $token]);
    })->name('group.add');
    
    Route::get('/group/addUser/{token}', [GroupController::class, 'relacionarUsuario'])->name('group.addUser');
    
    // Static pages
    Route::get('/terminos', function(){
        return Inertia::render('User/TerminosServicio');
    })->name('terminos');
    
    Route::get('/help', function(){
        return Inertia::render('User/Help');
    })->name('help');
});
