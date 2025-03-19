<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-bold">Edit Task</h1>
    </x-slot>

    <div class="container mx-auto px-4">
        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block text-gray-700">Title</label>
                <input type="text" name="title" class="w-full border rounded p-2" value="{{ $task->title }}" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Description</label>
                <textarea name="description" class="w-full border rounded p-2">{{ $task->description }}</textarea>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Assign To</label>
                <select name="assigned_to" class="w-full border rounded p-2">
                    <option value="">Unassigned</option>
                    @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ $task->assigned_to == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">
                Update Task
            </button>
        </form>
    </div>
</x-app-layout>