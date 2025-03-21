@extends('layouts.app')

@section('content')
<h1>Task Statistics</h1>
<p>Total Tasks: {{ $totalTasks }}</p>
<p>Completed Tasks: {{ $completedTasks }}</p>
<p>Pending Tasks: {{ $pendingTasks }}</p>

<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit">Log Out</button>
</form>
@endsection