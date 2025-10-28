    <x-app-layout>
        <form action="{{ route('tasks.store') }}" method="POST" class="space-y-4">
            @csrf

            <div class="container mx-auto p-6 bg-white rounded-lg shadow-md">


                {{-- Title Field --}}
                <div>
                    <label for="title" class="block font-semibold mb-1">Task Title <span class="text-red-600">*</span></label>
                    <input type="text" name="title" id="title" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Enter task title" value="{{ old('title') }}" >
                    @error('title')
                   <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Description Field --}}
                <div>
                    <label for="description" class="block font-semibold mb-1">Description</label>
                    <textarea name="description" id="description" rows="4" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Enter description (optional)">{{ old('description') }}</textarea>
                </div>

                {{-- Buttons --}}
                <div class="flex justify-between">
                    <a href="{{ route('tasks.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">⬅ Back</a>
                    <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-dark px-4 py-2 rounded">💾 Save Task</button>
                </div>
            </div>
        </form>
    </x-app-layout>
