<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Convocatoria;

class ConvocatoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Convocatoria::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha_inicio' => 'required|date',
            'fecha_termino' => 'required|date',
            'id_programa_educativo' => 'required|exists:programs,id',
            'cantidad_aspirantes' => 'required|integer',
            'fecha_examen' => 'required|date',
            'hora_examen' => 'required|date_format:H:i:s',
        ]);

        $convocatoria = Convocatoria::create($request->all());

        return response()->json($convocatoria, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Convocatoria::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'sometimes|required|string|max:255',
            'descripcion' => 'sometimes|required|string',
            'fecha_inicio' => 'sometimes|required|date',
            'fecha_termino' => 'sometimes|required|date',
            'id_programa_educativo' => 'sometimes|required|exists:programs,id',
            'cantidad_aspirantes' => 'sometimes|required|integer',
            'fecha_examen' => 'sometimes|required|date',
            'hora_examen' => 'sometimes|required|date_format:H:i:s',
        ]);

        $convocatoria = Convocatoria::findOrFail($id);
        $convocatoria->update($request->all());

        return response()->json($convocatoria, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $convocatoria = Convocatoria::findOrFail($id);
        $convocatoria->delete();

        return response()->json(null, 204);
    }
}
