<?php

use App\Http\Controllers\ApplicationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\App;



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
    return view('auth.login');
});

Route::get('/dashboard',  [HomeController::class, 'index'])->middleware(['auth'])
    ->name('dashboard');

Route::get('get_ajax_data', [HomeController::class, 'get_ajax_data'])->middleware(['auth']);



require __DIR__ . '/auth.php';

/* Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard'); */

Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'projects'], function () {

        Route::get('/', [ProjectController::class, 'index'])->name('projects.index');

        Route::get('/create', [ProjectController::class, 'create'])->name('projects.create');
        Route::get('/{project}/edit',     [ProjectController::class, 'edit'])->name('projects.edit');
        Route::get('/list/{project}', [ProjectController::class, 'list'])->name('projects.list');
        Route::get('/show/{project}', [ProjectController::class, 'show'])->name('projects.show');

        Route::post('/',                 [ProjectController::class, 'store'])->name('projects.store');

        Route::put('/{project}',           [ProjectController::class, 'update'])->name('projects.update');

        Route::delete('/{project}',        [ProjectController::class, 'destroy'])->name('projects.destroy');
    });


    Route::group(['prefix' => 'app'], function () {

        Route::get('/', [ApplicationController::class, 'index'])->name('app.index');
        Route::get('/create', [ApplicationController::class, 'create'])->name('app.create');
        Route::get('/{application}/edit',     [ApplicationController::class, 'edit'])->name('app.edit');
        Route::post('/',                 [ApplicationController::class, 'store'])->name('app.store');
        Route::put('/{id}',           [ApplicationController::class, 'update'])->name('app.update');
        Route::delete('/{application}',        [ApplicationController::class, 'destroy'])->name('app.destroy');
    });

    Route::group(['prefix' => 'users'], function () {


        Route::get('/show/{user}', [UserController::class, 'show'])->name('users.show');
    });
});