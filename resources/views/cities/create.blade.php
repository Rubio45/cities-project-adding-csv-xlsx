<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-white leading-tight">
                {{ __('Create City') }}
            </h2>
            <a href="{{ route('cities.index') }}"
                class="text-white bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4 rounded">
                {{ __('Back to Cities') }}
            </a>
        </div>  
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('cities.store') }}">
                        @csrf

                        <!-- Name Field -->
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 text-sm font-medium mb-2">Name:</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" required
                                class="shadow-sm border border-gray-300 rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring focus:ring-blue-300 focus:border-blue-500">
                            @error('name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Description Field -->
                        <div class="mb-4">
                            <label for="description"
                                class="block text-gray-700 text-sm font-medium mb-2">Description:</label>
                            <textarea name="description" id="description" rows="3" required
                                class="resize-none shadow-sm border border-gray-300 rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring focus:ring-blue-300 focus:border-blue-500">{{ old('description') }}</textarea>
                            @error('description')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit"
                            class="text-white bg-green-500 hover:bg-green-700 font-bold py-2 px-4 border rounded">
                            Create
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
