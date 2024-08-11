<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participante;
use App\Models\Aspirante;
use App\Models\Convocatoria;

class ParticipanteController extends Controller
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
        $request->validate([
            'id_aspirante' => 'required|exists:aspirantes,id',
            'fecha_inscripcion' => 'required|date',
            'activa' => 'required|boolean',
            'estatus' => 'required|in:Inscrito,en_proceso,completado,pendiente,suspendido,inactivo',
        ]);

        $convocatoria = Convocatoria::findOrFail($id);

        $participante = Participante::create([
            'id_aspirante' => $request->id_aspirante,
            'id_convocatoria' => $id,
            'fecha_inscripcion' => $request->fecha_inscripcion,
            'activa' => $request->activa,
            'estatus' => $request->estatus,
        ]);

        return response()->json($participante, 201);
    }
}
