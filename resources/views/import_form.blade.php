<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Importar Ciudades</title>
    @vite('resources/css/app.css') {{-- Asegúrate de que Tailwind esté bien configurado --}}
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="bg-white shadow-lg rounded-xl p-8 max-w-lg w-full">
        <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">📂 Importar Ciudades</h1>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 px-4 py-3 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('error'))
            <div class="bg-yellow-100 text-yellow-800 px-4 py-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('cities.import') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div>
                <label for="csv_file" class="block text-sm font-medium text-gray-700">Archivo CSV o XLSX</label>
                <input type="file" name="csv_file" accept=".csv,.xls,.xlsx" required
                       class="mt-2 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
            </div>

            <div class="text-center">
                <button type="submit"
                        class="inline-flex items-center px-6 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 transition">
                    Importar
                </button>
            </div>
        </form>
    </div>

</body>
</html>