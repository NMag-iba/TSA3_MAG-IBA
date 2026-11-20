@extends('layouts.site')

@section('title', 'Task List')
@section('heading', 'Task List')

@section('content')
    <style>
        .create-button {
            display: inline-block;
            padding: 8px 14px;
            border: 1px solid #767676;
            background-color: #efefef;
            color: black;
            text-decoration: none;
        }

        .create-button:hover {
            background-color: #dcdcdc;
        }

        .action-form {
            display: inline;
            margin: 0;
        }

        .link-button {
            border: none;
            background: none;
            color: purple;
            padding: 0;
            margin: 0;
            font: inherit;
            text-decoration: underline;
            cursor: pointer;
        }

        .action-separator {
            margin: 0 3px;
        }
    </style>

    <div class="content">

        @if (session('success'))
            <p style="color: green; text-align: center;">
                {{ session('success') }}
            </p>
        @endif

        @auth
            <p style="text-align: center;">
                <a
                    class="create-button"
                    href="{{ route('tasks.create') }}"
                >
                    Create New Task
                </a>
            </p>
        @endauth

        @if ($tasks->isEmpty())
            <p style="text-align: center;">
                No tasks found.
            </p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <td>{{ $task->title }}</td>
                            <td>{{ ucfirst($task->status) }}</td>
                            <td>{{ $task->task_date->format('Y-m-d') }}</td>
                            <td>{{ $task->created_at->format('Y-m-d H:i:s') }}</td>

                            <td>
                                <a href="{{ route('tasks.show', $task) }}">
                                    View
                                </a>

                                @auth
                                    <span class="action-separator">|</span>

                                    <a href="{{ route('tasks.edit', $task) }}">
                                        Edit
                                    </a>

                                    <span class="action-separator">|</span>

                                    <form
                                        class="action-form"
                                        method="POST"
                                        action="{{ route('tasks.destroy', $task) }}"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="link-button"
                                            onclick="return confirm('Archive this task?')"
                                        >
                                            Archive
                                        </button>
                                    </form>
                                @endauth
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection