@extends('layouts.app')

@section('content')
<h1>Tasks</h1>
<a href="{{ route('tasks.create') }}" class="btn btn-primary">Create New Task</a>
<ul>
    @foreach ($tasks as $task)
    <li>
        <strong>{{ $task->title }}</strong>
        <p>{{ $task->description }}</p>
        <p>Assigned to: {{ $task->assignedTo ? $task->assignedTo->name : 'Unassigned' }}</p>
        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-warning">Edit</a>
        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
        </form>
    </li>
    @endforeach
</ul>
@endsection