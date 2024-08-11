<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aspirante;

class AspiranteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Aspirante::all();
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
            'apellido_uno' => 'required|string|max:255',
            'apellido_dos' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'escuela_procedencia' => 'required|string|max:255',
            'nivel_escolaridad' => 'required|in:Licenciatura,Maestría,Doctorado',
            'titulo_descripcion' => 'required|string|max:255',
            'curp' => 'required|string|regex:/^[A-Z]{4}\d{6}[HM][A-Z]{5}[A-Z0-9]\d$/|unique:aspirantes',
            'id_usuario' => 'required|exists:users,id',
            'num_whatsapp' => 'required|string|max:15',
            'num_telefono' => 'required|string|max:15',
        ]);

        $aspirante = Aspirante::create($request->all());

        return response()->json($aspirante, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Aspirante::findOrFail($id);
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
            'apellido_uno' => 'sometimes|required|string|max:255',
            'apellido_dos' => 'sometimes|required|string|max:255',
            'fecha_nacimiento' => 'sometimes|required|date',
            'escuela_procedencia' => 'sometimes|required|string|max:255',
            'nivel_escolaridad' => 'sometimes|required|in:Licenciatura,Maestría,Doctorado',
            'titulo_descripcion' => 'sometimes|required|string|max:255',
            'curp' => 'sometimes|required|string|regex:/^[A-Z]{4}\d{6}[HM][A-Z]{5}[A-Z0-9]\d$/|unique:aspirantes,curp,'.$id,
            'id_usuario' => 'sometimes|required|exists:users,id',
            'num_whatsapp' => 'sometimes|required|string|max:15',
            'num_telefono' => 'sometimes|required|string|max:15',
        ]);

        $aspirante = Aspirante::findOrFail($id);
        $aspirante->update($request->all());

        return response()->json($aspirante, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aspirante = Aspirante::findOrFail($id);
        $aspirante->delete();

        return response()->json(null, 204);
    }
}
