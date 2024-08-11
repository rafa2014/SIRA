<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participante extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_aspirante',
        'id_convocatoria',
        'fecha_inscripcion',
        'activa',
        'estatus'
    ];

    /**
     * Get the aspirante that owns the participante.
     */
    public function aspirante()
    {
        return $this->belongsTo(Aspirante::class, 'id_aspirante');
    }

    /**
     * Get the convocatoria that owns the participante.
     */
    public function convocatoria()
    {
        return $this->belongsTo(Convocatoria::class, 'id_convocatoria');
    }
}
