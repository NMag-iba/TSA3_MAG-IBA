<?php

namespace App\Http\Controllers;

use App\Mail\TaskCompleted;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where('is_archived', false)
            ->orderBy('task_date')
            ->orderBy('created_at')
            ->get();

        return view('tasks', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:150'],
            'status' => ['required', 'in:pending,done'],
            'task_date' => ['required', 'date'],
        ]);

        Task::create($validated);

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Task created successfully.');
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:150'],
            'status' => ['required', 'in:pending,done'],
            'task_date' => ['required', 'date'],
        ]);

        $wasAlreadyDone = $task->status === 'done';

        $task->update($validated);

        if (! $wasAlreadyDone && $task->status === 'done') {
            Mail::to(
                config('mail.task_recipient', config('mail.from.address'))
            )->send(new TaskCompleted($task));
        }

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Task updated successfully.');
    }

    public function destroy(Task $task)
    {
        $task->update([
            'is_archived' => true,
        ]);

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Task archived successfully.');
    }

    public function welcome()
    {
        $tasks = Task::where('is_archived', false)
            ->whereDate('task_date', today())
            ->orderBy('created_at')
            ->get();

        return view('welcome', compact('tasks'));
    }

    public function profile()
    {
        $user = auth()->user() ?? User::firstOrFail();

        return view('profile', compact('user'));
    }

    public function about()
    {
        return view('about');
    }
}