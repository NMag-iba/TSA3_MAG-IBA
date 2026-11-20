<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">

    <title>Task Completed</title>
</head>
<body>
    <h2>Task Completed</h2>

    <p>The following task has been marked as done:</p>

    <p>
        <strong>Title:</strong>
        {{ $task->title }}
    </p>

    <p>
        <strong>Date:</strong>
        {{ $task->task_date->format('Y-m-d') }}
    </p>

    <p>
        <strong>Status:</strong>
        {{ ucfirst($task->status) }}
    </p>
</body>
</html>