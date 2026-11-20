@extends('layouts.site')

<style>
    .form-actions {
        display: flex;
        align-items: center;
        gap: 18px;
        margin-top: 25px;
    }

    .form-actions a {
        color: purple;
    }
</style>

@section('title', 'Create Task')
@section('heading', 'Create Task')

@section('content')
    <div class="content box">
        <form method="POST" action="{{ route('tasks.store') }}">
            @csrf

            <p>
                <label for="title">Task Title</label><br>

                <input
                    type="text"
                    id="title"
                    name="title"
                    value="{{ old('title') }}"
                    required
                    style="width: 100%; padding: 8px;"
                >

                @error('title')
                    <span style="color: red;">{{ $message }}</span>
                @enderror
            </p>

            <p>
                <label for="status">Status</label><br>

                <select
                    id="status"
                    name="status"
                    required
                    style="width: 100%; padding: 8px;"
                >
                    <option value="pending" {{ old('status') === 'pending' ? 'selected' : '' }}>
                        Pending
                    </option>

                    <option value="done" {{ old('status') === 'done' ? 'selected' : '' }}>
                        Done
                    </option>
                </select>

                @error('status')
                    <span style="color: red;">{{ $message }}</span>
                @enderror
            </p>

            <p>
                <label for="task_date">Task Date</label><br>

                <input
                    type="date"
                    id="task_date"
                    name="task_date"
                    value="{{ old('task_date') }}"
                    required
                    style="width: 100%; padding: 8px;"
                >

                @error('task_date')
                    <span style="color: red;">{{ $message }}</span>
                @enderror
            </p>

            <div class="form-actions">
                <button type="submit">
                    Save Task
                </button>

                <a href="{{ route('tasks.index') }}">
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection