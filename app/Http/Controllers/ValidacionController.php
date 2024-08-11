<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expediente;
use App\Models\Validacion;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class ValidacionController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        Log::info('Request recibido para validación', $request->all());

        try {
            $expediente = Expediente::findOrFail($id);
            $expediente->validado = true;
            $expediente->save();

            $validacion = Validacion::create([
                'id_usuario' => Auth::id(),
                'id_expediente' => $id,
                'fecha_validacion' => Carbon::now(),
            ]);

            Log::info('Validación registrada en la base de datos', $validacion->toArray());

            return response()->json(['message' => 'Documentación validada exitosamente'], 200);
        } catch (\Exception $e) {
            Log::error('Error al validar la documentación', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'Error al validar la documentación'], 500);
        }
    }
}
