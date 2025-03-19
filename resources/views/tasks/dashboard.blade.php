<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Task Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <!-- Add "Create Task" Button -->
                <a href="{{ route('tasks.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block hover:bg-blue-600 border-2">
                    Create New Task
                </a>

                <!-- Task Statistics -->
                <h1 class="text-xl font-bold mb-4">Task Statistics</h1>
                <p>Total Tasks: {{ $totalTasks }}</p>
                <p>Completed Tasks: {{ $completedTasks }}</p>
                <p>Pending Tasks: {{ $pendingTasks }}</p>

                <!-- Task List -->
                <div class="mt-8">
                    <h2 class="text-lg font-semibold mb-4">Your Tasks</h2>
                    @forelse ($tasks as $task)
                    <div class="border-b py-2">
                        <h3 class="font-medium">{{ $task->title }}</h3>
                        <p>{{ $task->description }}</p>
                        <div class="mt-2">
                            <a href="{{ route('tasks.edit', $task->id) }}" class="text-green-600">Edit</a>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline ml-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600">Delete</button>
                            </form>
                        </div>
                    </div>
                    @empty
                    <p>No tasks found. Create one!</p>
                    @endforelse
                </div>

                <!-- Logout Button -->
                <form action="{{ route('logout') }}" method="POST" class="mt-4">
                    @csrf
                    <button type="submit" class="text-red-600 hover:text-red-900">
                        Log Out
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>