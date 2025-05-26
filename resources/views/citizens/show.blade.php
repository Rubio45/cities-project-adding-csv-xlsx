<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900 dark:text-gray-200 leading-tight tracking-wide">
            {{ __('Citizen Details') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-gray-100 to-blue-50 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-200">
                <div class="p-8 bg-white">
                    <h3 class="text-2xl font-bold mb-6 text-blue-700 flex items-center gap-2">
                        <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5.121 17.804A13.937 13.937 0 0112 15c2.5 0 4.847.655 6.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        {{ __('Citizen Information') }}
                    </h3>
                    <div class="space-y-4 text-gray-700">
                        <div>
                            <span class="font-semibold text-gray-900">{{ __('Full Name:') }}</span>
                            <span>{{ $citizen->getFullName() }}</span>
                        </div>
                        <div>
                            <span class="font-semibold text-gray-900">{{ __('City:') }}</span>
                            <span>{{ $citizen->getCity() }}</span>
                        </div>
                        <div>
                            <span class="font-semibold text-gray-900">{{ __('Birth Date:') }}</span>
                            <span>{{ $citizen->birth_date }}</span>
                        </div>
                    </div>

                    <div class="flex flex-wrap gap-3 mt-8">
                        <a href="{{ route('citizens.index') }}"
                            class="inline-flex items-center px-5 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition font-medium">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M15 19l-7-7 7-7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            {{ __('Back to Citizens List') }}
                        </a>
                        <a href="{{ route('citizens.edit', $citizen->id) }}"
                            class="inline-flex items-center px-5 py-2 bg-yellow-500 text-white rounded-lg shadow hover:bg-yellow-600 transition font-medium">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M15.232 5.232l3.536 3.536M9 11l6 6M3 21h6l11-11a2.828 2.828 0 00-4-4L5 17v4z" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            {{ __('Edit Citizen') }}
                        </a>
                        <!-- Delete Button -->
                        <button type="button"
                            class="inline-flex items-center px-5 py-2 bg-red-600 text-white rounded-lg shadow hover:bg-red-700 transition font-medium"
                            onclick="openModal('modal-{{ $citizen->id }}')">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M6 18L18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            {{ __('Delete Citizen') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div id="modal-{{ $citizen->id }}"
            class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-40 hidden transition-all">
            <div class="bg-white rounded-xl shadow-2xl p-8 w-full max-w-md border border-gray-200">
                <h3 class="text-xl font-bold mb-4 text-red-600 flex items-center gap-2">
                    <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 9v2m0 4h.01M21 12c0 4.97-4.03 9-9 9s-9-4.03-9-9 4.03-9 9-9 9 4.03 9 9z" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    {{ __('Confirm Delete') }}
                </h3>
                <p class="mb-6 text-gray-700">{{ __('Are you sure you want to delete this citizen?') }}</p>
                <div class="flex justify-end gap-3">
                    <button type="button" onclick="closeModal('modal-{{ $citizen->id }}')"
                        class="px-5 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition font-medium">
                        {{ __('Cancel') }}
                    </button>
                    <form action="{{ route('citizens.destroy', $citizen->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="px-5 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition font-medium">
                            {{ __('Delete') }}
                        </button>
                    </form>
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
    </div>
</x-app-layout>
