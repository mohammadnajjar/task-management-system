
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
                    <form action="{{ route('projects.store') }}" method="POST">
                        @csrf
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name">
                        <label for="description">Description:</label>
                        <textarea id="description" name="description"></textarea>
                        <label for="deadline">Deadline:</label>
                        <input type="date" id="deadline" name="deadline">
                        <label for="departments">Departments:</label>
                        <select multiple id="departments" name="departments[]">
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                        <input type="submit" value="Create">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
