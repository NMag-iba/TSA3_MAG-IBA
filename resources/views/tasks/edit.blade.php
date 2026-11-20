@extends('layouts.site')

@section('title', 'Edit Task')
@section('heading', 'Edit Task')

@section('content')
    <style>
        .task-form p {
            margin-bottom: 20px;
        }

        .task-form input,
        .task-form select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        .form-actions {
            display: flex;
            align-items: center;
            gap: 18px;
            margin-top: 25px;
        }

        .form-actions a {
            color: purple;
        }

        .error {
            color: red;
        }
    </style>

    <div class="content box">
        <form
            class="task-form"
            method="POST"
            action="{{ route('tasks.update', $task) }}"
        >
            @csrf
            @method('PATCH')

            <p>
                <label for="title">Task Title</label><br>

                <input
                    type="text"
                    id="title"
                    name="title"
                    value="{{ old('title', $task->title) }}"
                    required
                >

                @error('title')
                    <span class="error">{{ $message }}</span>
                @enderror
            </p>

            <p>
                <label for="status">Status</label><br>

                <select
                    id="status"
                    name="status"
                    required
                >
                    <option
                        value="pending"
                        {{ old('status', $task->status) === 'pending' ? 'selected' : '' }}
                    >
                        Pending
                    </option>

                    <option
                        value="done"
                        {{ old('status', $task->status) === 'done' ? 'selected' : '' }}
                    >
                        Done
                    </option>
                </select>

                @error('status')
                    <span class="error">{{ $message }}</span>
                @enderror
            </p>

            <p>
                <label for="task_date">Task Date</label><br>

                <input
                    type="date"
                    id="task_date"
                    name="task_date"
                    value="{{ old('task_date', $task->task_date->format('Y-m-d')) }}"
                    required
                >

                @error('task_date')
                    <span class="error">{{ $message }}</span>
                @enderror
            </p>

            <div class="form-actions">
                <button type="submit">
                    Update Task
                </button>

                <a href="{{ route('tasks.index') }}">
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection