<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notificacion;
use App\Models\Aspirante;
use Illuminate\Support\Facades\Log;

class NotificacionController extends Controller
{
    /**
     * Display a listing of the notificaciones.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $notificaciones = Notificacion::all();
            return response()->json($notificaciones, 200);
        } catch (\Exception $e) {
            Log::error('Error al consultar las notificaciones', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'Error al consultar las notificaciones'], 500);
        }
    }

    /**
     * Store a newly created notification in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_aspirante' => 'required|exists:aspirantes,id',
            'titulo' => 'required|string|max:255',
            'mensaje' => 'required|string',
        ]);

        try {
            $notificacion = Notificacion::create($validated);
            return response()->json($notificacion, 201);
        } catch (\Exception $e) {
            Log::error('Error al crear la notificación', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'Error al crear la notificación'], 500);
        }
    }

    /**
     * Display the specified notification.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $notificacion = Notificacion::findOrFail($id);
            return response()->json($notificacion, 200);
        } catch (\Exception $e) {
            Log::error('Error al consultar la notificación', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'Error al consultar la notificación'], 500);
        }
    }

    /**
     * Update the specified notification in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'titulo' => 'sometimes|string|max:255',
            'mensaje' => 'sometimes|string',
            'leida' => 'sometimes|boolean',
        ]);

        try {
            $notificacion = Notificacion::findOrFail($id);
            $notificacion->update($validated);
            return response()->json($notificacion, 200);
        } catch (\Exception $e) {
            Log::error('Error al actualizar la notificación', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'Error al actualizar la notificación'], 500);
        }
    }

    /**
     * Remove the specified notification from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $notificacion = Notificacion::findOrFail($id);
            $notificacion->delete();
            return response()->json(['message' => 'Notificación eliminada exitosamente'], 200);
        } catch (\Exception $e) {
            Log::error('Error al eliminar la notificación', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'Error al eliminar la notificación'], 500);
        }
    }
}
