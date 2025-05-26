<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Create Citizen') }}
            </h2>
            <a href="{{ route('citizens.create') }}" class="inline-block px-4 py-2 bg-blue-600 text-gray-800 dark:text-gray-200 rounded hover:bg-blue-700 transition">
                {{ __('New Citizen') }}
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg p-6">
                <div class="grid gap-6">
                    @foreach($citizens as $citizen)
                        <div class="flex flex-col md:flex-row md:items-center justify-between bg-gray-50 rounded-lg p-4 shadow hover:shadow-md transition">
                            <div class="flex-1">
                                <div class="text-lg font-semibold text-gray-800">{{ $citizen->getFullName() }}</div>
                                <div class="text-sm text-gray-500">{{ $citizen->getCity() }}</div>
                                <div class="text-sm text-gray-400">Birth Date: {{ $citizen->birth_date }}</div>
                            </div>
                            <div class="flex mt-4 md:mt-0 space-x-2">
                                <a href="{{ route('citizens.edit', $citizen->id) }}" class="px-3 py-1 bg-yellow-400 text-white rounded hover:bg-yellow-500 transition">Edit</a>
                                <a href="{{ route('citizens.show', $citizen->id) }}" class="px-3 py-1 bg-blue-400 text-white rounded hover:bg-blue-500 transition">View</a>
                                <!-- Delete Button -->
                                <button type="button" class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 transition" onclick="openModal('modal-{{ $citizen->id }}')">
                                    Delete
                                </button>
                                <!-- Modal -->
                                <div id="modal-{{ $citizen->id }}" class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50 hidden">
                                    <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
                                        <h3 class="text-lg font-semibold mb-4">Confirm Delete</h3>
                                        <p class="mb-6">Are you sure you want to delete this citizen?</p>
                                        <div class="flex justify-end space-x-2">
                                            <button type="button" onclick="closeModal('modal-{{ $citizen->id }}')" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Cancel</button>
                                            <form action="{{ route('citizens.destroy', $citizen->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            function openModal(id) {
                                document.getElementById(id).classList.remove('hidden');
                            }
                            function closeModal(id) {
                                document.getElementById(id).classList.add('hidden');
                            }
                        </script>
                    @endforeach
                </div>
                <div class="mt-6">
                    {{ $citizens->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
