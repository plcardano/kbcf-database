<?php

use App\Http\Controllers\Accounts\UserController;
use App\Http\Controllers\Individuals\IndividualController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
  // return Inertia::render('Welcome', [
  //     'canLogin' => Route::has('login'),
  //     'canRegister' => Route::has('register'),
  //     'laravelVersion' => Application::VERSION,
  //     'phpVersion' => PHP_VERSION,
  // ]);

  return redirect(route('dashboard'));
});

Route::middleware(['auth', 'verified'])
  ->group(function () {
    
    Route::get('/dashboard', function () {
      return Inertia::render('HomeView');
    })->name('dashboard');

    Route::get('/profile', function () {
      return Inertia::render('Profile/Show');
    })->name('profile');

    // ACCOUNTS
    Route::prefix('accounts')->name('accounts.')
      ->group(function () {
        Route::prefix('users')->name('users.')
          ->controller(UserController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::get('edit/{user}', 'edit')->name('edit');
            Route::post('store', 'store')->name('store');
            Route::post('update/{user}', 'update')->name('update');
            Route::delete('archive/{user}', 'delete')->name('archive');
            Route::patch('restore/{user}', 'restore')->name('restore')->withTrashed();
          });
      });

    // PEOPLE
    Route::prefix('individuals')->name('individuals.')
      ->controller(IndividualController::class)
      ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::get('edit/{user}', 'edit')->name('edit');
        Route::post('store', 'store')->name('store');
        Route::post('update/{user}', 'update')->name('update');
        Route::delete('archive/{user}', 'delete')->name('archive');
        Route::patch('restore/{user}', 'restore')->name('restore')->withTrashed();
      });
});
