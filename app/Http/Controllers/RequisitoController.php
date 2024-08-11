<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Requisito;

class RequisitoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Requisito::all();
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
            'tipo' => 'required|in:prerrequisito,documento,habilidad',
            'obligatorio' => 'required|boolean',
            'dias_limite' => 'required|integer|min:1|max:365',
        ]);

        $requisito = Requisito::create($request->all());

        return response()->json($requisito, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Requisito::findOrFail($id);
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
            'tipo' => 'sometimes|required|in:prerrequisito,documento,habilidad',
            'obligatorio' => 'sometimes|required|boolean',
            'dias_limite' => 'sometimes|required|integer|min:1|max:365',
        ]);

        $requisito = Requisito::findOrFail($id);
        $requisito->update($request->all());

        return response()->json($requisito, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $requisito = Requisito::findOrFail($id);
        $requisito->delete();

        return response()->json(null, 204);
    }
}
