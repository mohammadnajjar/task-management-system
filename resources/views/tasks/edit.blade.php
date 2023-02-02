

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" value="{{ $task->name }}">
                        <label for="description">Description:</label>
                        <textarea id="description" name="description">{{ $task->description }}</textarea>
                        <label for="deadline">Deadline:</label>
                        <input type="date" id="deadline" name="deadline" value="{{ $task->deadline }}">
                        <label for="status">Status:</label>
                        <select id="status" name="status">
                            <option value="todo" @if($task->status === 'todo') selected @endif>To Do</option>
                            <option value="in_progress" @if($task->status === 'in_progress') selected @endif>In Progress</option>
                            <option value="done" @if($task->status === 'done') selected @endif>Done</option>
                        </select>
                        <label for="department_id">Department:</label>
                        <select id="department_id" name="department_id">
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}" @if($task->department_id === $department->id) selected @endif>{{ $department->name }}</option>
                            @endforeach
                        </select>
                        <label for="project_id">Project:</label>
                        <select id="project_id" name="project_id">
                            @foreach ($projects as $project)
                                <option value="{{ $project->id }}" @if($task->project_id === $project->id) selected @endif>{{ $project->name }}</option>
                            @endforeach
                        </select>
                        <input type="submit" value="Save">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
