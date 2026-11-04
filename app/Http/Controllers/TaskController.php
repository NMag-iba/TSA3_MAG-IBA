<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;

class TaskController extends Controller
{
    public function welcome()
    {
        $tasks = Task::whereDate('task_date', today())
            ->orderBy('created_at')
            ->get();

        return view('welcome', compact('tasks'));
    }

    public function tasks()
    {
        $tasks = Task::orderBy('task_date')
            ->orderBy('created_at')
            ->get();

        return view('tasks', compact('tasks'));
    }

    public function profile()
    {
        $user = User::firstOrFail();

        return view('profile', compact('user'));
    }

    public function about()
    {
        return view('about');
    }
}