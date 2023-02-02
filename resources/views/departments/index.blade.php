
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Departments') }}
        </h2>
    </x-slot>

    <div class="py-12 mb-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
{{--                    <a href="{{route('departments.create')}}" class="btn btn-primary">Add New Department</a>--}}
                    <x-primary-link href="{{route('departments.create')}}" class="mt-2 border border-primary py-2 px-6 text-primary inline-block rounded hover:bg-primary hover:text-white">{{ __('Add New Department') }}</x-primary-link>
                </div>
                @if(count($departments) > 0)
                <table class="min-w-full border text-center max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <thead class="border-b">
                    <tr>
                        <th scope="col" class="text-sm font-medium text-white px-6 py-4 border-r">
                            #
                        </th>
                        <th scope="col" class="text-sm font-medium text-white px-6 py-4 border-r">
                            Name
                        </th>
                        <th scope="col" class="text-sm font-medium text-white px-6 py-4 border-r">
                            Projects
                        </th>
                        <th scope="col" class="text-sm font-medium text-white px-6 py-4 border-r">
                            Tasks
                        </th>
                        <th scope="col" class="text-sm font-medium text-white px-6 py-4 border-r">
                            Users
                        </th>
                        <th scope="col" class="text-sm font-medium text-white px-6 py-4 border-r">
                            Actions
                        </th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($departments as $department)
                        <tr>
                    <tr class="border-b">
                        <td class="text-sm text-white font-medium px-6 py-4 whitespace-nowrap border-r">
                            {{ $loop->iteration }}
                        </td>
                        <td class="text-sm text-white font-medium px-6 py-4 whitespace-nowrap border-r">
                            {{ $department->name }}
                        </td>
                        <td class="text-sm text-white font-medium px-6 py-4 whitespace-nowrap border-r">
                            <select value="user.role" class="bg-transparent">
                                <option value="user">user</option>
                                <option value="admin">admin</option>
                            </select>
                        </td>


                    <td class="text-sm text-white font-medium px-6 py-4 whitespace-nowrap border-r">
                        <select value="user.role" class="bg-transparent">
                            <option value="user">user</option>
                            <option value="admin">admin</option>
                        </select>
                    </td>

                    <td class="text-sm text-white font-medium px-6 py-4 whitespace-nowrap border-r">
                        <select value="user.role" class="bg-transparent">
                            <option value="user">user</option>
                            <option value="admin">admin</option>
                        </select>
                    </td>


                        <td class="text-sm text-white font-light px-6 py-4 whitespace-nowrap border-r">
                            <a href="{{ route('departments.show', $department->id) }}">View</a>
                            <a href="{{ route('departments.edit', $department->id) }}">Edit</a>
                            <form action="{{ route('departments.destroy', $department->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete">
                            </form>
                        </td>
                    @endforeach
                    </tbody>
                </table>
                @else
                    <p>No Departments Found</p>
                @endif
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
<!-- component -->




