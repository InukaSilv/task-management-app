@extends('layouts.app')

@section('content')
<h1>Edit Task</h1>
<form action="{{ route('tasks.update', $task->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="{{ $task->title }}" required>
    </div>
    <div>
        <label for="description">Description:</label>
        <textarea name="description" id="description">{{ $task->description }}</textarea>
    </div>
    <div>
        <label for="assigned_to">Assign to:</label>
        <select name="assigned_to" id="assigned_to">
            <option value="">Unassigned</option>
            @foreach ($users as $user)
            <option value="{{ $user->id }}" {{ $task->assigned_to == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit">Update Task</button>
</form>
@endsection