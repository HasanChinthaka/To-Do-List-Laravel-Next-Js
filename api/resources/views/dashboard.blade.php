<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <a href="{{ route('add_task') }}"
                class="cursor-default bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                Add Task
            </a>
            <a href="{{ route('admin_msg') }}"
                class="cursor-default bg-transparent mx-4 hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                Send Message for Users
            </a>

            <a href="{{ route('show_msgs') }}"
                class="cursor-default bg-transparent mx-4 hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                Admin Messages <span class="bg-red-400 text-white px-2 py-1 rounded">{{ $message_count }}</span>
            </a>
            
            <div class="my-5 dark:bg-gray-800 text-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="table-auto flex-1 justify-between">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Title</th>
                            <th class="px-4 py-2">Description</th>
                            <th class="px-4 py-2">Date</th>
                            <th class="px-4 py-2">Time</th>
                            <th class="px-4 py-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                        @if ($task->is_completed == 0)
                        <tr class="bg-red-300 text-white rounded-lg my-8 justify-center items-center">
                            @elseif ($task->is_completed == 1)
                        <tr class="bg-green-300 text-white rounded-lg my-8 justify-center items-center">
                            @endif
                            <td class="px-4 py-2">{{ $task->title }}</td>
                            <td class="px-4 py-2">{{ $task->description }}</td>
                            <td class="px-4 py-2">{{ $task->date }}</td>
                            <td class="px-4 py-2">{{ $task->time }}</td>
                            @if ($task->is_completed == 0)
                            <td class="px-4 py-2">
                                <form action="{{ route('update_task_status') }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" value="{{ $task->id }}" name="task_id">
                                    <button type="submit" class="cursor-default bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Complete</button>
                                </form>
                                <a href="{{ route('edit_task', $task->id) }}" class="cursor-default bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">edit</a>
                                <form action="{{ route('delete_task') }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" value="{{ $task->id }}" name="task_id">
                                    <button type="submit" class="cursor-default bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded">Delete</button>
                                </form>
                            </td>
                            @elseif ($task->is_completed == 1)
                            <td>
                                <a href="{{ route('edit_task', $task->id) }}" class="cursor-default bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">edit</a>
                                <form action="{{ route('delete_task') }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" value="{{ $task->id }}" name="task_id">
                                    <button type="submit" class="cursor-default bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded">Delete</button>
                                </form>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>