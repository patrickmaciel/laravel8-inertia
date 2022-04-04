<?php

namespace App\Http\Controllers;

use App\Http\Resources\ThreadResource;
use App\Models\Thread;
use Inertia\Inertia;

class ThreadsController extends Controller
{
    public function index()
    {
        return Inertia::render('Threads/Index', [
            // 'threads' => Thread::with('author')->take(50)->latest()->get(),
            'threads' => ThreadResource::collection(Thread::with('author')->take(50)->latest()->get()),
        ]);
    }
}