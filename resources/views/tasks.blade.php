@extends('layouts.app')

@section('title', 'Task List')
@section('heading', 'Task List')

@section('content')
<div class="content">
    @if ($tasks->isEmpty())
        <p style="text-align: center;">No tasks found.</p>
    @else
        <table>
            <tr>
                <th>Title</th>
                <th>Status</th>
                <th>Date</th>
                <th>Created</th>
            </tr>

            @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->status }}</td>
                    <td>{{ $task->task_date->format('Y-m-d') }}</td>
                    <td>{{ $task->created_at->format('Y-m-d H:i:s') }}</td>
                </tr>
            @endforeach
        </table>
    @endif
</div>
@endsection