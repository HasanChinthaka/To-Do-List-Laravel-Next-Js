<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add New Task') }}
        </h2>
    </x-slot>

    <div class="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form class="max-w-7xl mx-auto sm:px-6 lg:px-8" action="{{ route('update_task', $task->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mt-4 flex flex-col bg-gray-100 rounded-lg p-4 shadow-sm">
                    <h2 class="text-black font-bold text-lg">Edit Task</h2>

                    <div class="mt-4">
                        <label class="text-black" for="task_title">Task Title</label>
                        <input value="{{$task->title}}" placeholder="Task Title" name="task_title" id="task_title" class="w-full bg-white rounded-md border-gray-300 text-black px-2 py-1" type="text">
                    </div>

                    <div class="mt-4">
                        <label class="text-black" for="task_discription">Task Discription</label>
                        <textarea placeholder="Task Description" name="task_description" id="task_description" class="w-full bg-white rounded-md border-gray-300 text-black px-2 py-1">{{ $task->description }}</textarea>
                    </div>

                    <div class="mt-4 flex flex-row space-x-2">
                        <div class="flex-1">
                            <label class="text-black" for="date">Date</label>
                            <input type="date" value="{{$task->date}}" name="date" id="date" class="w-full bg-white rounded-md border-gray-300 text-black px-2 py-1" id="city">
                        </div>

                        <div class="flex-1">
                            <label class="text-black" for="time">Time</label>
                            <input type="time" name="time" value="{{$task->time}}" id="time" class="w-full bg-white rounded-md border-gray-300 text-black px-2 py-1" id="state">
                        </div>
                        <div class="flex-1">
                            <label class="text-black" for="time">Status</label>
                            <input type="test" name="status" value="{{$task->is_completed}}" id="status" class="w-full bg-white rounded-md border-gray-300 text-black px-2 py-1" id="state">
                        </div>
                    </div>

                    <div class="mt-4 flex justify-end">
                        <button class="bg-green-200 text-black rounded-md px-4 py-1 hover:bg-green-600 hover:text-white" type="submit">Update</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>