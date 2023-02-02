<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Departments') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p>Name: {{ $department->name }}</p>
                    <h3>Projects:</h3>
                    @if ($department->projects->count() > 0)
                        <ul>
                            @foreach($department->projects as $project)
                                <li>{{ $project->name }}</li>
                            @endforeach
                        </ul>
                    @else
                    @endif
                    <a href="{{route('projects.create')}}" >add project</a>

                    <h3>Tasks:</h3>
                    @if ($department->tasks->count() > 0)
                        <ul>
                            @foreach($department->tasks as $task)
                                <li>{{ $task->name }}</li>
                            @endforeach
                        </ul>
                    @else
                    @endif
                    <a href="{{route('tasks.create')}}" >add task</a>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
