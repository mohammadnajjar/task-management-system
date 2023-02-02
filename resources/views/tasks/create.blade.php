

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
                    <form action="{{ route('tasks.store') }}" method="POST">
                        @csrf
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name">
                        <label for="description">Description:</label>
                        <textarea id="description" name="description"></textarea>
                        <label for="deadline">Deadline:</label>
                        <input type="date" id="deadline" name="deadline">
                        <label for="status">Status:</label>
                        <select id="status" name="status">
                            <option value="todo">To Do</option>
                            <option value="pending">pending</option>
                            <option value="in_progress">In Progress</option>
                            <option value="completed">completed</option>
                        </select>
                        <label for="department_id">Department:</label>
                        <select id="department_id" name="department_id">
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                        <label for="project_id">Project:</label>
                        <select id="project_id" name="project_id">
                            @foreach ($projects as $project)
                                <option value="{{ $project->id }}">{{ $project->name }}</option>
                            @endforeach
                        </select>
                        <label for="user_id">User:</label>
                        <select id="user_id" name="user_id">
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        <input type="submit" value="Create">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
