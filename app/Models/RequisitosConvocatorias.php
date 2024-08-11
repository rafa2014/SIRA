<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequisitosConvocatorias extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_convocatoria',
        'id_requisito',
        'cantidad',
        'original',
        'es_indispensable'
    ];

    /**
     * Get the convocatoria that owns the requisitos convocatorias.
     */
    public function convocatoria()
    {
        return $this->belongsTo(Convocatoria::class, 'id_convocatoria');
    }

    /**
     * Get the requisito that owns the requisitos convocatorias.
     */
    public function requisito()
    {
        return $this->belongsTo(Requisito::class, 'id_requisito');
    }
}
