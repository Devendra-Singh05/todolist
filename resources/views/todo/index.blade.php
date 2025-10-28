<x-app-layout>
    <div class="max-w-6xl mx-auto py-10 px-4">
        {{-- Success Message --}}
        @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
        @endif

        {{-- Header --}}
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-semibold text-gray-800">📝 Task List</h2>
            <a href="{{ route('tasks.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow-md transition">
                ➕ Add New Task
            </a>
        </div>

        {{-- Table --}}
        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="min-w-full border-collapse border border-gray-200">
                <thead class="bg-gray-100 border-b">
                    <tr>
                        <th class="text-left px-6 py-3 border-b text-gray-600 font-semibold">S.no</th>
                        <th class="text-left px-6 py-3 border-b text-gray-600 font-semibold">Title</th>
                        <th class="text-left px-6 py-3 border-b text-gray-600 font-semibold">Description</th>
                        <th class="text-center px-6 py-3 border-b text-gray-600 font-semibold">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($data as $task)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-3 border-b">{{ $loop->iteration }}</td>
                        <td class="px-6 py-3 border-b font-medium">{{ $task->title }}</td>
                        <td class="px-6 py-3 border-b text-gray-700"> <span class="relative group cursor-pointer" title="{{ $task->description }}">{{ Str::limit($task->description, 50)??'N/A' }}</td>

                        <td class="px-6 py-3 border-b text-center">
                            <a href="{{ route('tasks.edit', $task->id) }}" class="text-blue-500 hover:underline mr-3">Edit</a>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure?')" class="text-red-500 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-gray-500">
                            No Tasks Found 
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>



</x-app-layout>
