<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Convocatoria;
use Illuminate\Support\Facades\Log;

class EstatusGeneralConvocatoriaController extends Controller
{
    /**
     * Display a listing of the general status of the convocatorias.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $convocatorias = Convocatoria::withCount(['participantes as inscritos', 'participantes as completados' => function ($query) {
                $query->where('estatus', 'completado');
            }])->get();

            $estatusGeneral = $convocatorias->map(function ($convocatoria) {
                return [
                    'nombre' => $convocatoria->nombre,
                    'descripcion' => $convocatoria->descripcion,
                    'fecha_inicio' => $convocatoria->fecha_inicio,
                    'fecha_termino' => $convocatoria->fecha_termino,
                    'inscritos' => $convocatoria->inscritos,
                    'completados' => $convocatoria->completados,
                ];
            });

            return response()->json($estatusGeneral, 200);
        } catch (\Exception $e) {
            Log::error('Error al consultar el estatus general de las convocatorias', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'Error al consultar el estatus general de las convocatorias'], 500);
        }
    }
}
