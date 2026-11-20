@extends('layouts.site')

@section('title', 'Task Details')
@section('heading', 'Task Details')

@section('content')
    <div class="content box">
        <h2>{{ $task->title }}</h2>

        <p>
            <strong>Status:</strong>
            {{ ucfirst($task->status) }}
        </p>

        <p>
            <strong>Task Date:</strong>
            {{ $task->task_date->format('Y-m-d') }}
        </p>

        <p>
            <strong>Archived:</strong>
            {{ $task->is_archived ? 'Yes' : 'No' }}
        </p>

        <p>
            <a href="{{ route('tasks.index') }}">
                Back to Tasks
            </a>

            @auth
                |
                <a href="{{ route('tasks.edit', $task) }}">
                    Edit
                </a>
            @endauth
        </p>
    </div>
@endsection