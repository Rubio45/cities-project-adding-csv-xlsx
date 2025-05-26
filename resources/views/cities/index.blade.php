<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-2xl text-white leading-tight">
                {{ __('Cities') }}
            </h2>
            <a href="{{ route('cities.create') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg shadow-md transition duration-300">
                {{ __('Create New City') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="text-lg font-medium text-gray-700 dark:text-gray-300 mb-6">
                <span class="text-gray-900 dark:text-gray-100">Total de Registros: {{ $count }}</span> Cities
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                
                @foreach ($cities as $city)
                    <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden transform transition duration-300 hover:shadow-2xl hover:scale-105">
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100">{{ $city->name }}</h3>
                            <p class="mt-3 text-sm text-gray-600 dark:text-gray-400">{{ $city->description }}</p>
                            <div class="mt-6 flex justify-between items-center">
                                <a href="{{ route('cities.edit', $city->id) }}" class="text-blue-500 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-500 font-medium transition duration-300">
                                    Edit
                                </a>
                                <button 
                                    type="button" 
                                    class="text-red-500 dark:text-red-400 hover:text-red-700 dark:hover:text-red-500 font-medium transition duration-300" 
                                    onclick="openModal({{ $city->id }})">
                                    Delete
                                </button>

                                <div id="modal-{{ $city->id }}" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 flex items-center justify-center">
                                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 w-96">
                                        <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">Confirm Deletion</h2>
                                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-6">Are you sure you want to delete this city?</p>
                                        <div class="flex justify-end space-x-4">
                                            <button 
                                                type="button" 
                                                class="bg-gray-300 dark:bg-gray-700 text-gray-800 dark:text-gray-200 px-4 py-2 rounded-lg hover:bg-gray-400 dark:hover:bg-gray-600 transition duration-300"
                                                onclick="closeModal({{ $city->id }})">
                                                Cancel
                                            </button>
                                            <form action="{{ route('cities.destroy', $city->id) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button 
                                                    type="submit" 
                                                    class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition duration-300">
                                                    Confirm
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <script>
                                    function openModal(id) {
                                        document.getElementById(`modal-${id}`).classList.remove('hidden');
                                    }

                                    function closeModal(id) {
                                        document.getElementById(`modal-${id}`).classList.add('hidden');
                                    }
                                </script>
                            </div>
                        </div>
                    </div>
                @endforeach

                
            </div>
            <div class="mt-6">
                    {{ $cities->links() }}
                </div>
        </div>
    </div>
</x-app-layout>
