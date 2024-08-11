<?php

namespace App\Http\Controllers;
use App\Models\Participante;
use Illuminate\Http\Request;
use App\Models\Convocatoria;
use Illuminate\Support\Facades\Log;

class EstadoConvocatoriaController extends Controller
{
    /**
     * Display the status of the specified convocatoria.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $convocatoria = Convocatoria::findOrFail($id);

        // Calcular el estado de la convocatoria basado en las fechas
        $now = now();
        if ($now->lt($convocatoria->fecha_inicio)) {
            $estado = 'Pendiente';
        } elseif ($now->between($convocatoria->fecha_inicio, $convocatoria->fecha_termino)) {
            $estado = 'En curso';
        } else {
            $estado = 'Finalizada';
        }

        return response()->json([
            'convocatoria' => $convocatoria,
            'estado' => $estado
        ]);
    }

    /**
     * Display a listing of the convocatorias.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        try {
            $participaciones = Participante::with('convocatoria')
                ->where('id_aspirante', $id)
                ->get();

            $convocatorias = $participaciones->map(function ($participacion) {
                return [
                    'convocatoria' => $participacion->convocatoria->nombre,
                    'estatus' => $participacion->estatus,
                    'fecha_inscripcion' => $participacion->fecha_inscripcion,
                    'activa' => $participacion->activa,
                ];
            });

            return response()->json($convocatorias, 200);
        } catch (\Exception $e) {
            Log::error('Error al consultar el estado de las convocatorias', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'Error al consultar el estado de las convocatorias'], 500);
        }
    }

}
