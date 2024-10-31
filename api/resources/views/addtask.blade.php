<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add New Task') }}
        </h2>
    </x-slot>

    <div class="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form class="max-w-7xl mx-auto sm:px-6 lg:px-8" action="{{ route('save_task') }}" method="POST">
                @csrf
                <div class="mt-4 flex flex-col bg-gray-100 rounded-lg p-4 shadow-sm">
                    <h2 class="text-black font-bold text-lg">Add New Task</h2>

                    <div class="mt-4">
                        <label class="text-black" for="task_title">Task Title</label>
                        <input type="text" placeholder="Task Title" name="task_title" id="task_title" class="w-full bg-white rounded-md border-gray-300 text-black px-2 py-1" type="text">
                    </div>

                    <div class="mt-4">
                        <label class="text-black" for="task_discription">Task Discription</label>
                        <textarea type="text" placeholder="Task Discription" name="task_discription" id="task_discription" class="w-full bg-white rounded-md border-gray-300 text-black px-2 py-1" id="address"></textarea>
                    </div>

                    <div class="mt-4 flex flex-row space-x-2">
                        <div class="flex-1">
                            <label class="text-black" for="date">Date</label>
                            <input type="date" name="date" id="date class="w-full bg-white rounded-md border-gray-300 text-black px-2 py-1" id="city" type="text">
                        </div>

                        <div class="flex-1">
                            <label class="text-black" for="time">Time</label>
                            <input type="time" name="time" id="time class="w-full bg-white rounded-md border-gray-300 text-black px-2 py-1" id="state" type="text">
                        </div>
                    </div>

                    <div class="mt-4 flex justify-end">
                        <button class="bg-blue-200 text-black rounded-md px-4 py-1 hover:bg-blue-600 hover:text-gray-900" type="submit">Submit</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>