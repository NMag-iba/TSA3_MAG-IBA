@extends('layouts.site')

@section('title', "Today's Tasks")
@section('heading', "Today's Tasks")

@section('content')
<div class="content">
    <p>Date: {{ today()->format('F d, Y') }}</p>

    @if ($tasks->isEmpty())
        <p>No tasks for today.</p>
    @else
        <table>
            <tr>
                <th>Title</th>
                <th>Status</th>
                <th>Date</th>
            </tr>

            @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->status }}</td>
                    <td>{{ $task->task_date->format('Y-m-d') }}</td>
                </tr>
            @endforeach
        </table>
    @endif
</div>
@endsection