<?php

use App\Http\Controllers\Auth\LoginController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
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

    Route::get('/users', function () {
        return Inertia::render('Users/Index', [
            'time' => now()->toTimeString(),
            'users' => User::query()
                ->when(request('search'), function ($query, $search) {
                    return $query->where('name', 'like', "%{$search}%");
                })
                ->paginate(5)
                ->withQueryString()
                ->through(fn ($user) => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'can' => [
                        'edit' => Auth::user()->can('edit', $user),
                    ],
                ]),

            'filters' => request()->only(['search']),
            'can' => [
                'createUser' => Auth::user()->can('create', User::class),
            ],
        ]);
    });

    Route::get('/users/create', function () {
        return Inertia::render('Users/Create');
        // })->middleware('can:create,App\Models\User');
    })->can('create', 'App\Models\User');

    Route::post('/users', function () {
        $attributes = Request::validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);
        User::create($attributes);

        return redirect('/users');
    });

    Route::get('/settings', function () {
        return Inertia::render('Settings');
    });
});
