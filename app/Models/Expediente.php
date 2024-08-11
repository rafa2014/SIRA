<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expediente extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_participante',
        'id_requisito_convocatoria',
        'entregado',
        'ruta_archivo',
        'validado'
    ];

    /**
     * Get the participante that owns the expediente.
     */
    public function participante()
    {
        return $this->belongsTo(Participante::class, 'id_participante');
    }

    /**
     * Get the requisito convocatoria that owns the expediente.
     */
    public function requisitoConvocatoria()
    {
        return $this->belongsTo(RequisitosConvocatorias::class, 'id_requisito_convocatoria');
    }


}
