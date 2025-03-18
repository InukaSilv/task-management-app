<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Task Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h1>Task Statistics</h1>
                <p>Total Tasks: {{ $totalTasks }}</p>
                <p>Completed Tasks: {{ $completedTasks }}</p>
                <p>Pending Tasks: {{ $pendingTasks }}</p>

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