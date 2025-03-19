<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-bold">Tasks</h1>
    </x-slot>

    <div class="container mx-auto px-4">
        <a href="{{ route('tasks.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">
            Create New Task
        </a>
        <ul class="space-y-4">
            @foreach ($tasks as $task)
            <li class="border p-4 rounded">
                <strong class="text-lg">{{ $task->title }}</strong>
                <p class="text-gray-600">{{ $task->description }}</p>
                <p class="text-sm mt-2">Assigned to: {{ $task->assignedTo ? $task->assignedTo->name : 'Unassigned' }}</p>
                <div class="mt-2">
                    <a href="{{ route('tasks.edit', $task->id) }}" class="text-green-600 hover:text-green-800">Edit</a>
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline ml-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-800">Delete</button>
                    </form>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</x-app-layout>