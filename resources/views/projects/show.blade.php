<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Projects') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p>Name: {{ $project->name }}</p>
                    <p>Description: {{ $project->description }}</p>
                    <td>Deadline: {{ $project->deadline }}</td>
                    <p>Departments:
                        @foreach($project->departments as $department)
                            {{ $department->name }},
                        @endforeach
                    </p>
                    <h3>Tasks:</h3>
                    <ul>
                        @foreach($project->tasks as $task)
                            <li>{{ $task->name }}</li>
                        @endforeach
                    </ul>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
