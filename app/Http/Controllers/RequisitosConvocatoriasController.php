<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RequisitosConvocatorias;
use App\Models\Convocatoria;
use App\Models\Requisito;

class RequisitosConvocatoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  int  $id_convocatoria
     * @return \Illuminate\Http\Response
     */
    public function index($id_convocatoria)
    {
        $convocatoria = Convocatoria::findOrFail($id_convocatoria);
        return $convocatoria->requisitos;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id_convocatoria
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id_convocatoria)
    {
        $request->validate([
            'id_requisito' => 'required|exists:requisitos,id',
            'cantidad' => 'required|integer|min:1',
            'original' => 'required|boolean',
            'es_indispensable' => 'required|boolean',
        ]);

        $convocatoria = Convocatoria::findOrFail($id_convocatoria);

        $asignacion = RequisitosConvocatorias::create([
            'id_convocatoria' => $id_convocatoria,
            'id_requisito' => $request->id_requisito,
            'cantidad' => $request->cantidad,
            'original' => $request->original,
            'es_indispensable' => $request->es_indispensable,
        ]);

        return response()->json($asignacion, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id_convocatoria
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_convocatoria, $id)
    {
        $asignacion = RequisitosConvocatorias::where('id_convocatoria', $id_convocatoria)
                                        ->where('id', $id)
                                        ->firstOrFail();
        $asignacion->delete();

        return response()->json(null, 204);
    }
}
