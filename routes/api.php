<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ConvocatoriaController;
use App\Http\Controllers\EstadoConvocatoriaController;
use App\Http\Controllers\AspiranteController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\RequisitoController;
use App\Http\Controllers\RequisitosConvocatoriasController;
use App\Http\Controllers\ParticipanteController;
use App\Http\Controllers\ExpedienteController;
use App\Http\Controllers\ValidacionController;
use App\Http\Controllers\EstatusGeneralConvocatoriaController;
use App\Http\Controllers\AspiranteDatosController;
use App\Http\Controllers\NotificacionController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
// Ruta de prueba
Route::get('/test', function () {
    return response()->json(['message' => 'API is working']);
});

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout']);
Route::get('user', [AuthController::class, 'getUser'])->middleware('auth:api');

// Rutas de CRUD de roles
Route::middleware('auth:api')->group(function () {
    Route::apiResource('roles', RoleController::class);
});

// Rutas de CRUD de aspirantes
Route::middleware('auth:api')->group(function () {
    Route::apiResource('aspirantes', AspiranteController::class);
});

// Rutas de CRUD de empleados
Route::middleware('auth:api')->group(function () {
    Route::apiResource('empleados', EmpleadoController::class);
});

// Rutas de CRUD de programas educativos
Route::middleware('auth:api')->group(function () {
    Route::apiResource('programs', ProgramController::class);
});

// Rutas de CRUD de convocatorias
Route::middleware('auth:api')->group(function () {
    Route::apiResource('convocatorias', ConvocatoriaController::class);
});

// Rutas para consultar el estado de las convocatorias
Route::middleware('auth:api')->group(function () {
    Route::get('convocatorias/{id}/estado', [EstadoConvocatoriaController::class, 'show']);
});

// Rutas para consultar el estado de las convocatorias del aspirante
Route::middleware('auth:api')->group(function () {
    Route::get('aspirantes/{id}/convocatorias', [EstadoConvocatoriaController::class, 'index']);
});

// Rutas de CRUD de requisitos
Route::middleware('auth:api')->group(function () {
    Route::apiResource('requisitos', RequisitoController::class);
});

// Rutas para asignar requisitos a convocatorias
Route::middleware('auth:api')->group(function () {
    Route::post('convocatorias/{id_convocatoria}/requisitos', [RequisitosConvocatoriasController::class, 'store']);
    Route::get('convocatorias/{id_convocatoria}/requisitos', [RequisitosConvocatoriasController::class, 'index']);
    Route::delete('convocatorias/{id_convocatoria}/requisitos/{id}', [RequisitosConvocatoriasController::class, 'destroy']);
});

// Rutas para registrar participación en convocatoria
Route::middleware('auth:api')->group(function () {
    Route::post('convocatorias/{id}/participar', [ParticipanteController::class, 'store']);
});

// Rutas para subir documentación en convocatoria
Route::middleware('auth:api')->group(function () {
    Route::post('expedientes', [ExpedienteController::class, 'store']);
});

// Rutas para validar documentación
Route::middleware('auth:api')->group(function () {
    Route::post('expedientes/{id}/validar', [ValidacionController::class, 'store']);
});

// Rutas para visualizar el estatus general de las convocatorias
Route::middleware('auth:api')->group(function () {
    Route::get('convocatorias/estatus/general', [EstatusGeneralConvocatoriaController::class, 'index']);
});

// Rutas para consumir datos generales de los aspirantes
Route::middleware('auth:api')->group(function () {
    Route::get('extern/aspirantes', [AspiranteDatosController::class, 'index']);
    Route::get('extern/aspirantes/{curp}', [AspiranteDatosController::class, 'showByCurp']);
});

// Rutas para gestionar notificaciones
Route::middleware('auth:api')->group(function () {
    Route::get('notificaciones', [NotificacionController::class, 'index']);
    Route::post('notificaciones', [NotificacionController::class, 'store']);
    Route::get('notificaciones/{id}', [NotificacionController::class, 'show']);
    Route::put('notificaciones/{id}', [NotificacionController::class, 'update']);
    Route::delete('notificaciones/{id}', [NotificacionController::class, 'destroy']);
});

// Ruta de prueba
Route::get('test', function () {
    return response()->json(['message' => 'API is working']);
});
