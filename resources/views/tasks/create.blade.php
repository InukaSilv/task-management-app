@extends('layouts.app')

@section('content')
<h1>Create New Task</h1>
<form action="{{ route('tasks.store') }}" method="POST">
    @csrf
    <div>
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" required>
    </div>
    <div>
        <label for="description">Description:</label>
        <textarea name="description" id="description"></textarea>
    </div>
    <div>
        <label for="assigned_to">Assign to:</label>
        <select name="assigned_to" id="assigned_to">
            <option value="">Unassigned</option>
            @foreach ($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit">Create Task</button>
</form>
@endsection