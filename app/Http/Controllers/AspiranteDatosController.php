<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aspirante;
use Illuminate\Support\Facades\Log;

class AspiranteDatosController extends Controller
{
    /**
     * Display a listing of the aspirantes' general data.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $aspirantes = Aspirante::select('id', 'nombre', 'apellido_uno', 'apellido_dos', 'fecha_nacimiento', 'escuela_procedencia', 'nivel_escolaridad', 'titulo_descripcion', 'curp', 'num_whatsapp', 'num_telefono')->get();

            return response()->json($aspirantes, 200);
        } catch (\Exception $e) {
            Log::error('Error al consultar los datos generales de los aspirantes', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'Error al consultar los datos generales de los aspirantes'], 500);
        }
    }

    /**
     * Display the specified aspirante by CURP.
     *
     * @param  string  $curp
     * @return \Illuminate\Http\Response
     */
    public function showByCurp($curp)
    {
        try {
            $aspirante = Aspirante::where('curp', $curp)->first();

            if (!$aspirante) {
                return response()->json(['error' => 'Aspirante no encontrado'], 404);
            }

            return response()->json($aspirante, 200);
        } catch (\Exception $e) {
            Log::error('Error al consultar el aspirante por CURP', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'Error al consultar el aspirante por CURP'], 500);
        }
    }
}
