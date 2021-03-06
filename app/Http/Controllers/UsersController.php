<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class UsersController extends Controller
{
    public function index()
    {
        // $users = UserResource::collection(User::query()->paginate(5)->withQueryString());
        $users = User::query()
            ->when(request('search'), function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%");
            })
            ->paginate(5)
            ->withQueryString()
            ->through(fn ($user) => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'can' => [
                    'edit' => Auth::user()->can('edit', $user),
                ],
            ]);

        return Inertia::render('Users/Index', [
            'time' => now()->toTimeString(),
            // 'users' => UserResource::collection(User::query()->paginate(5)->withQueryString()),
            'users' => $users,
            'filters' => request()->only(['search']),
            'can' => [
                'createUser' => Auth::user()->can('create', User::class),
            ],
        ]);
    }

    public function create()
    {
        return Inertia::render('Users/Create');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);
        User::create($attributes);

        return redirect('/users');
    }

    public function show(User $user)
    {
        return Inertia::render('Users/Show', [
            // 'user' => $user->only(['id', 'name', 'email', 'created_at']),
            'user' => UserResource::make($user),
            // 'user' => $user,
        ]);
    }
}
