<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UsersController;
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

Route::get('login', [LoginController::class, 'create'])->name('login');
Route::post('login', [LoginController::class, 'store']);
Route::post('logout', [LoginController::class, 'destroy']);

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return Inertia::render('Welcome', [
            'username' => 'PatrickMaciel',
            'name' => 'Patrick Maciel',
            'idade' => 32,
            'frameworks' => ['Laravel', 'Vue', 'InertiaJs'],
        ]);
    });

    Route::get('/users', [UsersController::class, 'index']);
    Route::get('/users/create', [UsersController::class, 'create'])->can('create', 'App\Models\User');
    Route::post('/users', [UsersController::class, 'store']);

    Route::get('/settings', function () {
        return Inertia::render('Settings');
    });
});
