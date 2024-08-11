<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Program::all();
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
            'clave' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'vigencia' => 'required|date',
            'abreviatura' => 'required|string|max:10',
            'tipo' => 'required|string|size:1',
        ]);

        $program = Program::create($request->all());

        return response()->json($program, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Program::findOrFail($id);
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
            'clave' => 'sometimes|required|string|max:255',
            'descripcion' => 'sometimes|required|string',
            'vigencia' => 'sometimes|required|date',
            'abreviatura' => 'sometimes|required|string|max:10',
            'tipo' => 'sometimes|required|string|size:1',
        ]);

        $program = Program::findOrFail($id);
        $program->update($request->all());

        return response()->json($program, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $program = Program::findOrFail($id);
        $program->delete();

        return response()->json(null, 204);
    }
}
