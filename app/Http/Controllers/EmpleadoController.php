<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Empleado::all();
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
            'clave' => 'required|string|max:255|unique:empleados',
            'id_usuario' => 'required|exists:users,id',
        ]);

        $empleado = Empleado::create($request->all());

        return response()->json($empleado, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Empleado::findOrFail($id);
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
            'clave' => 'sometimes|required|string|max:255|unique:empleados,clave,'.$id,
            'id_usuario' => 'sometimes|required|exists:users,id',
        ]);

        $empleado = Empleado::findOrFail($id);
        $empleado->update($request->all());

        return response()->json($empleado, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empleado = Empleado::findOrFail($id);
        $empleado->delete();

        return response()->json(null, 204);
    }
}
