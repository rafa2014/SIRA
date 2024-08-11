<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expediente;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class ExpedienteController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Log::info('Request recibido', $request->all());

        try {
            $request->validate([
                'id_participante' => 'required|exists:participantes,id',
                'id_requisito_convocatoria' => 'required|exists:requisitos_convocatorias,id',
                'entregado' => 'required|boolean',
                'archivo' => 'required|file|mimes:pdf|max:2048',
            ]);
            Log::info('Validación pasada');
        } catch (ValidationException $e) {
            Log::error('Error de validación', ['errors' => $e->errors()]);
            return response()->json(['errors' => $e->errors()], 422);
        }

        // Generar un nombre único para el archivo
        try {
            $file = $request->file('archivo');
            $timestamp = Carbon::now()->format('Ymd_His');
            $filename = "participante_{$request->id_participante}_requisito_{$request->id_requisito_convocatoria}_{$timestamp}.pdf";
            $path = $file->storeAs('documentos', $filename);

            Log::info('Archivo guardado en', ['path' => $path]);
        } catch (\Exception $e) {
            Log::error('Error al guardar el archivo', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'Error al guardar el archivo'], 500);
        }

        try {
            $expediente = Expediente::create([
                'id_participante' => $request->id_participante,
                'id_requisito_convocatoria' => $request->id_requisito_convocatoria,
                'entregado' => $request->entregado,
                'ruta_archivo' => $path,
                'validado' => false,
            ]);

            Log::info('Registro creado en la base de datos', $expediente->toArray());

            return response()->json($expediente, 201);
        } catch (\Exception $e) {
            Log::error('Error al crear el registro en la base de datos', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'Error al crear el registro en la base de datos'], 500);
        }
    }
}
