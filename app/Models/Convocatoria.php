<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Convocatoria extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'descripcion',
        'fecha_inicio',
        'fecha_termino',
        'id_programa_educativo',
        'cantidad_aspirantes',
        'fecha_examen',
        'hora_examen'
    ];

    /**
     * Get the program that owns the Convocatoria.
     */
    public function programaEducativo()
    {
        return $this->belongsTo(Program::class, 'id_programa_educativo');
    }

    public function participantes()
    {
        return $this->hasMany(Participante::class, 'id_convocatoria');
    }
}
