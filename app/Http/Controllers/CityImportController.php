<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class CityImportController extends Controller
{
    public function import(Request $request)
{
    $request->validate([
        'csv_file' => 'required|file|mimes:csv,txt,xlsx,xls'
    ]);

    $data = Excel::toArray([], $request->file('csv_file'));
    $rows = $data[0];

    // Verifica que hay al menos una fila
    if (empty($rows)) {
        return redirect()->back()->withErrors(['El archivo está vacío o no se pudo leer.']);
    }

    // Verifica que tenga columnas esperadas (al menos 'name' en la cabecera)
    $header = array_map('strtolower', $rows[0]);

    if (!in_array('name', $header)) {
        return redirect()->back()->withErrors(['El archivo debe contener una columna llamada "name".']);
    }
    if (!in_array('description', $header)) {
        return redirect()->back()->withErrors(['El archivo debe contener una columna llamada "description".']);
    }

    array_shift($rows); // quitar encabezado

    $nameIndex = array_search('name', $header);
    $descriptionIndex = array_search('description', $header);

    foreach ($rows as $index => $row) {
        if (empty($row[$nameIndex])) {
            return redirect()->back()->withErrors(['Fila ' . ($index + 2) . ' no contiene un valor válido en la columna "name".']);
        }

        DB::table('cities')->insert([
            'name' => $row[$nameIndex],
            'description' => $descriptionIndex !== false ? ($row[$descriptionIndex] ?? null) : null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    return redirect(route('cities.index'))->with('success', 'Ciudades importadas correctamente.');
    return redirect()->back()->withErrors(['Error al importar las ciudades. Por favor, verifica el formato del archivo.']);
}
}